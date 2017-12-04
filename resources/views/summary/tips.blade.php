@extends('layout')

@section('content')
  <h2 class="title">Most Recent Tips</h2>
  @foreach ($tips as $tip)
  <div class="card tip">
    <div class="card-content">
      <div class="columns is-mobile is-vertically-aligned">
        <div class="column is-1-desktop is-2-mobile is-paddingless has-text-centered">
            <a href="/champions/{{ $tip->champion }}/tips">
                <img src="{{ $tip->championDetails->portrait }}">
            </a>
        </div>
        <div class="column is-1 is-hidden-mobile has-text-centered is-paddingless">

          <form method="POST" action="/tips/vote/{{ $tip->id }}">
            {{ csrf_field() }}
            <input type="hidden" name="vote_value" value="up">
            <button class="button
                {{ Auth::check() && $tip->votes->where('user_id', Auth::id())->where('value', 1)->count() > 0 ? 'is-success' : '' }}"
                {{ Auth::guest() ? 'disabled' : '' }}
            >
                <span class="fa fa-chevron-up"></span>
            </button>
          </form>
        
          <span class="is-block is-paddingless">
            {{ $tip->votes->sum('value') }}
          </span>

          <form method="POST" action="/tips/vote/{{ $tip->id }}">
            {{ csrf_field() }}
            <input type="hidden" name="vote_value" value="down">
            <button class="button
                {{ Auth::check() && $tip->votes->where('user_id', Auth::id())->where('value', -1)->count() > 0 ? 'is-danger' : '' }}"
                {{ Auth::guest() ? 'disabled' : '' }}
            >
                <span class="fa fa-chevron-down"></span>
            </button>
          </form>
        </div>
        <div class="column is-10">
          <p class="subtitle">{!! $tip->tip !!}</p>
          <p class="has-text-right">by {{ $tip->author }}</p>
        </div>
      </div>
    </div>
  </div>
  @endforeach
@endsection
