@props(['disabled' => false, 'options' => [], 'error' => ''])
<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-select mt-1.5 w-full rounded-lg border border-slate-300 bg-white px-3 py-2 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:bg-navy-700 dark:hover:border-navy-400 dark:focus:border-accent']) !!}>
    <option value="">Choose...</option>
    @foreach($options as $key => $value)
    <option value="{{ $key }}">{{ $value }}</option>
    @endforeach
</select>

@error($error)
<span class="text-error">{{ $message }}</span>
@enderror
