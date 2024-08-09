@if ($errors->any())
    <div {{ $attributes }}>
        <div class="text-tiny+ text-error">{{ __('Whoops! Something went wrong.') }}</div>

        <ul class="text-tiny+ text-error">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
