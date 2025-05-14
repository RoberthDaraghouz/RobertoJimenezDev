<?php

use App\Livewire\Forms\ExperienceForm;
use Livewire\Volt\Component;

new class extends Component {
    public ExperienceForm $form;

    public function save(): void {
        $this->form->store();

        $this->redirectRoute('experience.index', navigate: true);
    }
}; ?>

<div>
    {{-- Header --}}
    <header class="flex justify-between">
        <h1 class="text-2xl font-bold dark:text-white">{{ __('New experience') }}</h1>
        <flux:button
            :href="route('experience.index')"
            icon="chevron-left"
            size="sm"
            wire:navigate>
            <span class="hidden md:block">
                {{ __('Back') }}
            </span>
        </flux:button>
    </header>

    {{-- Form --}}
    <div class="py-6 max-w-3xl">
        <form wire:submit="save" class="space-y-6">

            @include('livewire.experience.partials.form')

            <div class="flex gap-6 pt-3">
                <flux:button
                    :href="route('experience.index')"
                    size="sm"
                    wire:navigate >
                    {{ __('Cancel') }}
                </flux:button>

                <flux:button
                    variant="primary"
                    size="sm"
                    type="submit"
                    class="w-full">
                        {{ __('Save') }}
                </flux:button>
            </div>
        </form>
    </div>
</div>