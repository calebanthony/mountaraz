<nav class="navbar ">
  <div class="container">
    <div class="navbar-brand">
      <a class="navbar-item" href="/">
        <h3 class="title is-3">Mount Araz</h3>
      </a>

      <div class="navbar-burger burger" data-target="mainMenu">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>

    <div id="mainMenu" class="navbar-menu">
      <div class="navbar-start">
        {{--  <div class="navbar-item has-dropdown is-hoverable is-highlighted">
          <a class="navbar-link" href="/champions">Champions</a>
          <div class="navbar-dropdown">
          </div>
        </div>  --}}
        <a class="navbar-item" href="/champions">Champions</a>
        <a class="navbar-item" href="/tips">Tips</a>
        <a class="navbar-item" href="/counters">Counters</a>
        {{--  <a href="/discuss" class="navbar-item">
          Discuss
        </a>  --}}
        {{--  <a href="/watch" class="navbar-item">
          Watch
        </a>  --}}
      </div>

      <div class="navbar-end">
          @if (Auth::check())
              <div class="navbar-item has-dropdown is-hoverable">
                  <a href="#" class="navbar-link">
                      {{ Auth::user()->name }}
                  </a>
                  <div class="navbar-dropdown">
                      {{--  <a href="/profile/{{ Auth::user()->name }}" class="navbar-item">My Profile</a>  --}}

                      {{--  <a href="/my/guides" class="navbar-item">My Guides</a>  --}}

                      <a
                          class="navbar-item"
                          href="{{ route('logout') }}"
                          onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                          Logout
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                  </div>
              </div>
          @else
              <div class="navbar-item">
                  <div class="field is-grouped">
                      <a class="button control" href="/login">Log In</a>
                      <a class="button control is-primary" href="/register">Register</a>
                  </div>
              </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</nav>
