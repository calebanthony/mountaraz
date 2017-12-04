@extends('layout')

@section('content')
<div class="container">
    <div class="columns is-multiline is-mobile is-centered">
        @foreach($champions as $c)
            <div class="column is-1-desktop is-3-mobile is-champion">
            <a href="/champions/{{ $c->name }}/builds">
                <img src="{{ $c->portrait }}">
                <p class="is-size-5 champion-name">{{ $c->name }}</p>
            </a>
            </div>
        @endforeach
    </div>
    <div class="columns">
        <div class="column is-6">
            <h2 class="title">Recent Tips</h2>
            @foreach($tips as $tip)
                <div class="card tip">
                    <div class="card-content">
                    <div class="columns is-vertically-aligned">
                        <div class="column is-2 is-paddingless has-text-centered">
                            <a href="/champions/{{ $tip->champion }}/tips">
                                <img src="{{ $tip->championDetails->portrait }}">
                            </a>
                        </div>
                        <div class="column is-1 has-text-centered is-paddingless">

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
                        <div class="column is-9">
                        <p class="subtitle">{!! $tip->tip !!}</p>
                        <p class="has-text-right">by {{ $tip->author }}</p>
                        </div>
                    </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="column is-6">
            <h2 class="title">Recent Counters</h2>
            @foreach($counters as $counter)
                <div class="card tip">
                    <div class="card-content">
                    <div class="columns is-vertically-aligned">
                        <div class="column is-2 is-paddingless has-text-centered">
                            <a href="/champions/{{ $counter->champion }}/tips">
                                <img src="{{ $counter->championDetails->portrait }}">
                            </a>
                        </div>
                        <div class="column is-1 has-text-centered is-paddingless">

                        <form method="POST" action="/tips/vote/{{ $counter->id }}">
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

                        <form method="POST" action="/tips/vote/{{ $counter->id }}">
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
                        <div class="column is-9">
                        <p class="subtitle">{!! $counter->counter !!}</p>
                        <p class="has-text-right">by {{ $counter->author }}</p>
                        </div>
                    </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
