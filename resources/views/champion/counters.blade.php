@extends('champion.index')

@section('championContent')
  <h4>Tricks and ways to counter {{ $champion->name }}.</h4>
  @foreach ($counters as $counter)
  <div class="card tip">
    <div class="card-content">
      <div class="columns is-mobile is-vertically-aligned">
        <div class="column is-1 has-text-centered is-paddingless is-hidden-mobile">

          <form method="POST" action="/counters/vote/{{ $counter->id }}">
            {{ csrf_field() }}
            <input type="hidden" name="vote_value" value="up">
            <button class="button
                {{ Auth::check() && $counter->votes->where('user_id', Auth::id())->where('value', 1)->count() > 0 ? 'is-success' : '' }}"
                {{ Auth::guest() ? 'disabled' : '' }}
            >
                <span class="fa fa-chevron-up"></span>
            </button>
          </form>
        
          <span class="is-block is-paddingless">
            {{ $counter->votes->sum('value') }}
          </span>

          <form method="POST" action="/counters/vote/{{ $counter->id }}">
            {{ csrf_field() }}
            <input type="hidden" name="vote_value" value="down">
            <button class="button
                {{ Auth::check() && $counter->votes->where('user_id', Auth::id())->where('value', -1)->count() > 0 ? 'is-danger' : '' }}"
                {{ Auth::guest() ? 'disabled' : '' }}
            >
                <span class="fa fa-chevron-down"></span>
            </button>
          </form>
        </div>
        <div class="column is-11-desktop is-12-mobile">
          <p class="subtitle">{!! $counter->counter !!}</p>
          <p class="has-text-right">by {{ $counter->author }}</p>
        </div>
      </div>
    </div>
  </div>
  @endforeach
@endsection
