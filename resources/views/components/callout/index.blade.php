@props([
    'on',
    'type' => 'success',
])

@php
    switch ($type) {
        case 'fail':
            $classes = 'bg-white fixed top-10 right-10 px-4 py-2 shadow rounded text-sm text-zinc-700 font-semibold flex items-center gap-2
                border-l-4 border-red-700';
            break;
        default:
            $classes = 'bg-white fixed top-10 right-10 px-4 py-2 shadow rounded text-sm text-zinc-700 font-semibold flex items-center gap-2
                border-l-4 border-sky-800';
            break;
    }
@endphp

<div
    x-data="{ shown: false, timeout: null }"
    x-init="@this.on('{{ $on }}', () => { clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, 2000); })"
    x-show.transition.out.opacity.duration.1500ms="shown"
    x-transition:leave.opacity.duration.1500ms
    style="display: none"
    class="{{ $classes }}">
    @switch($type)
        @case('fail')
            <flux:icon.pencil class="size-4" />
            @break
        @default
            <flux:icon.check class="size-4" />
    @endswitch
    {{ $slot }}
</div>