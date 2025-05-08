<?php

use App\Models\Experience;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\On;
use Livewire\Volt\Component;

new class extends Component {
    public Collection $experiences;

    #[On('experience-deleted')]
    public function mount(): void {
        $this->experiences = Experience::orderBy('created_at', 'DESC')->get();
    }
}; ?>

<div>
    {{-- Header --}}
    <header class="flex justify-between">
        <h1 class="text-2xl">Experiencia</h1>
        <x-button.link :href="route('experience.new')" wire:navigate>
            <flux:icon.plus class="size-4" />
            Nueva <span class="hidden sm:flex">experiencia</span>
        </x-button.link>
    </header>

    {{-- Results --}}
    <div class="py-6">
        @if ($experiences)
            <div class="grid grid-cols-2 gap-6">
                @foreach ($experiences as $experience)
                    <x-card.experience :$experience optional_buttons />
                @endforeach
            </div>
        @else
            <x-alert />
        @endif
    </div>
</div>