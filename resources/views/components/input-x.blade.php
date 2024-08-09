@props(['disabled' => false, 'error' => '', 'type' => 'text', 'image' => ''])
<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-input mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent']) !!} type="{{ $type }}">

@if($image)
<div class="mt-3">
    <img src="{{ $image }}" alt="" width="100px" style="border-radius: 22px;">
</div>
@endif

@error($error)
<span class="mt-1 text-error">{{ $message }}</span>
@enderror