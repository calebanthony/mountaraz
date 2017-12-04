<div id="buildModal" class="modal">
	<div id="buildModalClose" class="modal-background"></div>
	<div class="modal-card">
		<header class="modal-card-head">
			<p class="modal-card-title">Submit a Build</p>
			<button id="buildModalCloseBtn" class="delete" aria-label="close"></button>
		</header>
		<section class="modal-card-body">
      <form action="/build" method="POST">
        {{ csrf_field() }}
        <div class="columns is-mobile">
          @foreach($champion->battlerites->where('skill', $champion->ability('LMB')->name) as $b)
            <div class="column is-2-desktop is-4-mobile build-battlerite" data-hotkey="{{ $b->hotkey }}" data-name="{{ $b->name }}">
              @include('partials.battlerite', $b)
            </div>
          @endforeach
        </div>
        <div class="columns is-mobile">
          @foreach($champion->battlerites->where('skill', $champion->ability('RMB')->name) as $b)
            <div class="column is-2-desktop is-4-mobile build-battlerite" data-hotkey="{{ $b->hotkey }}" data-name="{{ $b->name }}">
              @include('partials.battlerite', $b)
            </div>
          @endforeach
        </div>
        <div class="columns is-mobile">
          @foreach($champion->battlerites->where('skill', $champion->ability('SPACE')->name) as $b)
            <div class="column is-2-desktop is-4-mobile build-battlerite" data-hotkey="{{ $b->hotkey }}" data-name="{{ $b->name }}">
              @include('partials.battlerite', $b)
            </div>
          @endforeach
        </div>
        <div class="columns is-mobile">
          @foreach($champion->battlerites->where('skill', $champion->ability('Q')->name) as $b)
            <div class="column is-2-desktop is-4-mobile build-battlerite" data-hotkey="{{ $b->hotkey }}" data-name="{{ $b->name }}">
              @include('partials.battlerite', $b)
            </div>
          @endforeach
        </div>
        <div class="columns is-mobile">
          @foreach($champion->battlerites->where('skill', $champion->ability('E')->name) as $b)
            <div class="column is-2-desktop is-4-mobile build-battlerite" data-hotkey="{{ $b->hotkey }}" data-name="{{ $b->name }}">
              @include('partials.battlerite', $b)
            </div>
          @endforeach
        </div>
        <div class="columns is-mobile">
          @foreach($champion->battlerites->where('skill', $champion->ability('R')->name) as $b)
            <div class="column is-2-desktop is-4-mobile build-battlerite" data-hotkey="{{ $b->hotkey }}" data-name="{{ $b->name }}">
              @include('partials.battlerite', $b)
            </div>
          @endforeach
        </div>
        <div class="columns is-mobile">
          @foreach($champion->battlerites->where('skill', $champion->ability('F')->name) as $b)
            <div class="column is-2-desktop is-4-mobile build-battlerite" data-hotkey="{{ $b->hotkey }}" data-name="{{ $b->name }}">
              @include('partials.battlerite', $b)
            </div>
          @endforeach
        </div>
        <input type="hidden" name="champion" value="{{ $champion->name }}">
        <input id="battleriteBuild" type="hidden" name="battlerites" value="">
        <div class="field">
          <div class="control">
            <button class="button is-link">Submit</button>
          </div>
        </div>
      </form>
		</section>
	</div>
</div>
