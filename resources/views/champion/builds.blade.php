@extends('champion.index')

@section('championContent')
  <h2 class="title">Top Builds</h2>
  @foreach ($builds as $build)
  <div class="card tip">
    <div class="card-content">
      <div class="columns is-mobile is-vertically-aligned">
        <div class="column is-1 has-text-centered is-paddingless is-hidden-mobile">

          <form method="POST" action="/builds/vote/{{ $build->id }}">
            {{ csrf_field() }}
            <input type="hidden" name="vote_value" value="up">
            <button class="button
                {{ Auth::check() && $build->votes->where('user_id', Auth::id())->where('value', 1)->count() > 0 ? 'is-success' : '' }}"
                {{ Auth::guest() ? 'disabled' : '' }}
            >
                <span class="fa fa-chevron-up"></span>
            </button>
          </form>
        
          <span class="is-block is-paddingless">
            {{ $build->votes->sum('value') }}
          </span>

          <form method="POST" action="/builds/vote/{{ $build->id }}">
            {{ csrf_field() }}
            <input type="hidden" name="vote_value" value="down">
            <button class="button
                {{ Auth::check() && $build->votes->where('user_id', Auth::id())->where('value', -1)->count() > 0 ? 'is-danger' : '' }}"
                {{ Auth::guest() ? 'disabled' : '' }}
            >
                <span class="fa fa-chevron-down"></span>
            </button>
          </form>
        </div>
        <div class="column is-9">
        <div class="columns is-mobile is-multiline">
          @foreach ($build->battlerites as $b)
            <div class="column is-2-desktop is-4-mobile">
              @include('partials.battlerite', $b)
            </div>
          @endforeach
        </div>
        </div>
        <div class="column is-2 build-attribution">
          <p class="has-text-right">by {{ $build->author }}</p>
        </div>
      </div>
    </div>
  </div>
  @endforeach
@endsection
