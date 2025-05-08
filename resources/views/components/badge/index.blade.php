@props(['color' => 'default'])

@php
    switch ($color) {
        case 'blue':
            $classes = 'bg-blue-50 border border-blue-200 text-blue-600/75';
            break;
        case 'violet':
            $classes = 'bg-violet-50 border border-violet-200 text-violet-600/75';
            break;
        case 'pink':
            $classes = 'bg-pink-50 border border-pink-200 text-pink-600/75';
            break;
        case 'red':
            $classes = 'bg-red-50 border border-red-200 text-red-600/75';
            break;
        case 'sky':
            $classes = 'bg-sky-50 border border-sky-200 text-sky-600/75';
            break;
        default:
            $classes = 'bg-slate-50 border border-slate-200 text-slate-600/75';
            break;
    }
@endphp

<div class="{{ $classes }} py-0.5 px-3 rounded-full text-sm font-semibold text-center block">
    {{ $slot }}
</div>