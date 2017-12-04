@extends('layout')

@section('content')
<div class="container columns">
  @include('modals.tip')
  @include('modals.counter')
  @include('modals.build')

  <div class="column is-9">
    <div class="tabs is-boxed">
      <ul>
        {{--  <li class="{{ request()->is('*/stats') ? 'is-active' : '' }}">
          <a href="/champions/{{ $champion->name }}/stats">
            <span class="icon"><span class="fa fa-bar-chart"></span></span>
            <span>Stats</span>
          </a>
        </li>  --}}
        <li class="{{ request()->is('*/builds') ? 'is-active' : '' }}">
          <a href="/champions/{{ $champion->name }}/builds">
            <span class="icon"><span class="fa fa-pencil-square-o"></span></span>
            <span>Builds</span>
          </a>
        </li>
        <li class="{{ request()->is('*/tips') ? 'is-active' : '' }}">
          <a href="/champions/{{ $champion->name }}/tips">
            <span class="icon"><span class="fa fa-exclamation"></span></span>
            <span>Tips</span>
          </a>
        </li>
        <li class="{{ request()->is('*/counters') ? 'is-active' : '' }}">
          <a href="/champions/{{ $champion->name }}/counters">
            <span class="icon"><span class="fa fa-ban"></span></span>
            <span>Counters</span>
          </a>
        </li>
        {{--  <li class="{{ request()->is('*/combos') ? 'is-active' : '' }}">
          <a href="/champions/{{ $champion->name }}/combos">
            <span class="icon"><span class="fa fa-plus"></span></span>
            <span>Combos</span>
          </a>
        </li>  --}}
      </ul>
    </div>
    <div class="content">
      @yield('championContent')
    </div>
  </div>

  <div id="championDetails" class="column is-3 has-text-centered">
    @if(Auth::check())
      <h2 class="title">Submit New...</h2>
      <nav class="level is-mobile">
        <div id="buildModalBtn" class="level-item">
          <button class="button" tooltip-title="Build">
            <span class="icon"><span class="fa fa-pencil-square-o"></span></span>
          </button>
        </div>
        <div id="tipModalBtn" class="level-item">
          <button class="button" tooltip-title="Tip">
            <span class="icon"><span class="fa fa-exclamation"></span></span>
          </button>
        </div>
        <div id="counterModalBtn" class="level-item">
          <button class="button" tooltip-title="Counter">
            <span class="icon"><span class="fa fa-ban"></span></span>
          </button>
        </div>
        {{--  <div class="level-item">
          <button class="button" tooltip-title="Combo">
            <span class="icon"><span class="fa fa-plus"></span></span>
          </button>
        </div>  --}}
      </nav>
    <hr>
    @endif
    <h1 class="title">{{ $champion->name }}</h1>
    {{--  <h3 class="subtitle">{{ $champion->type }}</h3>  --}}
    <img src="{{ $champion->profile }}">
    <div class="columns is-multiline is-mobile">
      <div class="column is-12">
        <h4 class="subtitle has-text-left">Abilities</h4>
      </div>
      <div class="column is-ability is-2 is-offset-1">
        @include('partials.ability', ['a' => $champion->ability('LMB')])
      </div>
      <div class="column is-ability is-2">
        @include('partials.ability', ['a' => $champion->ability('RMB')])
      </div>
      <div class="column is-ability is-2">
        @include('partials.ability', ['a' => $champion->ability('Q')])
      </div>
      <div class="column is-ability is-2">
        @include('partials.ability', ['a' => $champion->ability('E')])
      </div>
      <div class="column is-ability is-2">
        @include('partials.ability', ['a' => $champion->ability('R')])
      </div>
      <div class="column is-ability is-2 is-offset-2">
        @include('partials.ability', ['a' => $champion->ability('EX1')])
      </div>
      <div class="column is-ability is-2">
        @include('partials.ability', ['a' => $champion->ability('EX2')])
      </div>
      <div class="column is-ability is-2 is-offset-2">
        @include('partials.ability', ['a' => $champion->ability('F')])
      </div>
    </div>
    <div class="columns is-multiline is-mobile">
      <div class="column is-12">
        <h4 class="subtitle has-text-left">Battlerites</h4>
      </div>
      <div class="column is-12 columns is-mobile is-paddingless">
        @foreach($champion->battlerites->where('skill', $champion->ability('LMB')->name) as $b)
          <div class="column is-3-desktop is-4-mobile">
            @include('partials.battlerite', $b)
          </div>
        @endforeach
      </div>
      <div class="column is-12 columns is-mobile is-paddingless">
        @foreach($champion->battlerites->where('skill', $champion->ability('RMB')->name) as $b)
          <div class="column is-3-desktop is-4-mobile">
            @include('partials.battlerite', $b)
          </div>
        @endforeach
      </div>
      <div class="column is-12 columns is-mobile is-paddingless">
        @foreach($champion->battlerites->where('skill', $champion->ability('Q')->name) as $b)
          <div class="column is-3-desktop is-4-mobile">
            @include('partials.battlerite', $b)
          </div>
        @endforeach
      </div>
      <div class="column is-12 columns is-mobile is-paddingless">
        @foreach($champion->battlerites->where('skill', $champion->ability('E')->name) as $b)
          <div class="column is-3-desktop is-4-mobile">
            @include('partials.battlerite', $b)
          </div>
        @endforeach
      </div>
      <div class="column is-12 columns is-mobile is-paddingless">
        @foreach($champion->battlerites->where('skill', $champion->ability('R')->name) as $b)
          <div class="column is-3-desktop is-4-mobile">
            @include('partials.battlerite', $b)
          </div>
        @endforeach
      </div>
      <div class="column is-12 columns is-mobile is-paddingless">
        @foreach($champion->battlerites->where('skill', $champion->ability('F')->name) as $b)
          <div class="column is-3-desktop is-4-mobile">
            @include('partials.battlerite', $b)
          </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
@endsection
