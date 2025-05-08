@props([
    'experience' => null,
    'optional_buttons' => false
])

@php
    ($optional_buttons) ? $classes = 'border-1 border-slate-300 px-4'
                        : $classes = '';
@endphp

<div class="border-0 border-slate-100 py-4 rounded-2xl {{ $classes }}" wire:key="experience-{{ $experience->id }}">
    <div class="mb-2">
        <h3 class="text-slate-800 text-2xl font-bold">{{ $experience->company }}</h3>
        <p class="text-slate-600 text-sm">{{ $experience->first_date }} <span class="text-slate-400">a</span> {{ $experience->last_date }}</p>
    </div>
    <div class="text-slate-700 font-light">
        {{ $experience->description }}
    </div>
    @if ($optional_buttons)
        <div class="flex gap-2 mt-4">
            <x-button.link :href="route('experience.edit', $experience)" variant="secondary" wire:navigate>
                Editar
            </x-button>

            @livewire('experience.delete-modal', ['experience' => $experience], key('delete-experience-' . $experience->id))
        </div>
    @endif
</div>