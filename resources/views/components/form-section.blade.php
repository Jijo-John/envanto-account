@props(['submit'])

<div {{ $attributes->merge(['class' => '']) }}>
   

    <div class="">
        <form wire:submit="{{ $submit }}">
            <div>
                <div class="">
                    {{ $form }}
                </div>
            </div>

            @if (isset($actions))
                <div>
                    {{ $actions }}
                </div>
            @endif
        </form>
    </div>
</div>
