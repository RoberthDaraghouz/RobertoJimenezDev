<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>

<div>
    {{-- Header --}}
    <header class="flex justify-between">
        <h1 class="text-2xl">Proyectos</h1>
        <x-button.link :href="route('experience.new')" wire:navigate>
            <flux:icon.plus class="size-4" />
            Nuevo <span class="hidden sm:flex">proyecto</span>
        </x-button.link>
    </header>

    {{-- Results --}}
    <div class="py-6">
        {{-- @if ($experiences)
            <div class="grid grid-cols-2 gap-6">
                @foreach ($experiences as $experience)
                    <x-card.experience :$experience optional_buttons />
                @endforeach
            </div>
        @else
            <x-alert />
        @endif --}}
    </div>
</div>