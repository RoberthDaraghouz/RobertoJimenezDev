@props([
    'variant' => 'default'
])

@php
    switch ($variant) {
        case 'primary':
            $classes = 'bg-sky-900 text-white text-sm border-1 border-transparent rounded-full px-3 py-1.5 md:px-4
                transition cursor-pointer flex justify-center items-center gap-1.5
                hover:bg-sky-950 hover:border-sky-950';
            break;
        case 'secondary':
            $classes = 'bg-white text-slate-600 text-sm border-1 border-slate-600 rounded-full px-3 py-1.5 md:px-4
                transition cursor-pointer flex justify-center items-center gap-1.5
                hover:bg-slate-50';
            break;
        case 'danger':
            $classes = 'bg-red-700 text-white text-sm border-1 border-transparent rounded-full px-3 py-1.5 md:px-4
                transition cursor-pointer flex justify-center items-center gap-1.5
                hover:bg-white hover:text-red-700 hover:border-red-800';
            break;
        default:
            $classes = 'bg-sky-900 text-white text-sm border-1 border-transparent rounded-full px-3 py-1.5 md:px-4
                transition cursor-pointer flex justify-center items-center gap-1.5
                hover:bg-white hover:text-sky-800 hover:border-sky-800';
            break;
    }
@endphp

<a {{ $attributes->merge([
    'class' => $classes
]) }}>
    {{ $slot }}
</a>