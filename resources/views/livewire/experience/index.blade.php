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
        <h1 class="text-2xl font-bold dark:text-white">{{ __('Experience') }}</h1>

        <flux:button
            :href="route('experience.new')"
            icon="plus"
            size="sm"
            wire:navigate>
            <span class="hidden md:block">
                {{ __('New experience') }}
            </span>
        </flux:button>
    </header>

    {{-- Results --}}
    <div class="py-6">
        @if ($experiences->count())
            <div class="grid md:grid-cols-2 gap-6">
                @foreach ($experiences as $experience)
                    <x-card.experience :$experience optional_buttons />
                @endforeach
            </div>
        @else
            <flux:callout
                heading="{{ __('Information') }}"
                icon="information-circle"
                color="purple"
                variant="secondary">
                    <flux:callout.text>
                        {{ __('No results found.') }}
                    </flux:callout.text>
            </flux:callout>
        @endif
    </div>
</div>