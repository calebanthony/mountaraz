<div
    class="is-battlerite"
    tooltip-title="
        <div class='battlerite-tooltip columns is-mobile is-multiline'>
            <div class='column is-12 is-battlerite-title {{ strtolower($b->type) }}-title'>
                <p class='is-size-5'>{{ $b->name }}</p>
            </div>
            <div class='column is-3 is-battlerite-image'>
                <img src='{{ $b->image }}'>
            </div>
            <div class='column is-9 is-battlerite-description'>
                <p>{{ $b->description }}</p>
            </div>
        </div>
    "
>
    
    <img class="is-{{ strtolower($b->type) }}-battlerite" src="{{ $b->image }}">
</div>
