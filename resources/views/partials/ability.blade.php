<div
    class="is-ability"
    tooltip-title="
        <div class='ability-tooltip columns is-mobile is-multiline'>
            <div class='column is-12 is-ability-title'>
                <p class='is-size-5'>{{ $a->name }}</p>
            </div>
            <div class='column is-3 is-ability-image'>
                <img src='{{ $a->image }}'>
            </div>
            <div class='column is-9 is-ability-description'>
                <p>{{ $a->description }}</p>
            </div>
        </div>
    "
>
    
    <img src="{{ $a->image }}">
    <span class="tag ability-hotkey is-dark">{{ $a->hotkey }}</span>
</div>
