@props([
    'experience' => null,
    'optional_buttons' => false
])

@php
    ($optional_buttons) ? $classes = 'border-1 border-zinc-300 px-4 dark:border-zinc-700 rounded-lg'
                        : $classes = 'border-l-4 border-sky-700 pl-4';
@endphp

<div class="py-3 {{ $classes }}"
    wire:key="experience-{{ $experience->id }}">
        <div class="mb-2">
            <h3 class="text-zinc-800 text-2xl font-bold dark:text-white">{{ $experience->company }}</h3>
            <p class="text-zinc-600 text-sm dark:text-white/70">
                {{ $experience->first_date }}

                <span class="text-zinc-400 dark:text-white/50">
                    {{ __('to') }}
                </span>

                {{ $experience->last_date }}
            </p>
        </div>

        <div class="text-zinc-700 font-light dark:text-white/70">
            {{ $experience->description }}
        </div>

        @if ($optional_buttons)
            <div class="flex gap-2 mt-4">
                <flux:button
                    :href="route('experience.edit', $experience)"
                    size="sm"
                    wire:navigate >
                        {{ __('Edit') }}
                </flux:button>

                @livewire('experience.delete-modal', ['experience' => $experience], key('delete-experience-' . $experience->id))
            </div>
        @endif
</div>