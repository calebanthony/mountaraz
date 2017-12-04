@extends('layout')

@section('content')
<div class="columns is-multiline has-text-centered is-mobile is-centered">
  @foreach($champions as $c)
    <div class="column is-2-desktop is-6-mobile is-champion">
      <a href="/champions/{{ $c->name }}/builds">
        <img src="{{ $c->profile }}">
        <p class="is-size-5 champion-name">{{ $c->name }}</p>
      </a>
    </div>
  @endforeach
</div>
@endsection
