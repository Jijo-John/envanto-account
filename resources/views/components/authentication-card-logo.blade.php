@props(['logo'])
<a href="{{route('dashboard')}}">
    <img class="mx-auto h-11 w-11 transition-transform duration-500 ease-in-out hover:rotate-[360deg]" src="{{ $logo ?? '' }}" alt="logo">
</a>
