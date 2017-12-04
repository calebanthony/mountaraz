<div id="tipModal" class="modal">
	<div id="tipModalClose" class="modal-background"></div>
	<div class="modal-card">
		<header class="modal-card-head">
			<p class="modal-card-title">Submit a Tip</p>
			<button id="tipModalCloseBtn" class="delete" aria-label="close"></button>
		</header>
		<section class="modal-card-body">
      <form action="/tips" method="POST">
        {{ csrf_field() }}
        <div class="field">
          <div class="control">
            <div name="tip" id="tip" class="textarea" required></div>
          </div>
        </div>
        <div class="field">
          <div class="control">
            <label class="checkbox">
              <input type="checkbox" required>
              I'm sure my tip doesn't already exist.
            </label>
          </div>
        </div>
        <input type="hidden" name="champion" value="{{ $champion->name }}">
        <div class="field">
          <div class="control">
            <button class="button is-link">Submit</button>
          </div>
        </div>
      </form>
		</section>
	</div>
</div>
