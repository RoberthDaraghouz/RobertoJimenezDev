@props([
    'title' => 'UNTITLED',
    'subtitle' => '',
    'year' => 'NO YEAR',
    'image_source' => 'NO IMAGE',
])

<div class="border-1 border-slate-100 rounded-2xl bg-white shadow-lg h-fit overflow-hidden">
    <div class="h-60">
        @if ($image_source != 'NO IMAGE')
            <img src="{{ $image_source }}" class="object-cover w-full h-full" alt="Project image">
        @else
            NO IMAGE
        @endif
    </div>
    <div class="py-4 px-6 space-y-4 relative">
        <div>
            <h3 class="text-slate-800 text-2xl font-bold">{{ $title }}</h3>
            <p class="text-slate-400 text-sm">{{ $subtitle }} <span class="mx-1">·</span> {{ $year }}</p>
        </div>
        <div class="text-slate-700 font-light space-y-4">
            {{ $slot }}
        </div>
    </div>
</div>