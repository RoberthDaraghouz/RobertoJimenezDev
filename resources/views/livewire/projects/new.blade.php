<?php

use App\Livewire\Forms\ProjectForm;
use Livewire\Volt\Component;
use Livewire\WithFileUploads;

new class extends Component {
    use WithFileUploads;

    public ProjectForm $form;

    public function removeCurrentImage(): void {
        $this->form->image = null;
    }

    public function save(): void {
        $this->form->store();

        $this->redirectRoute('projects.index', navigate: true);
    }
}; ?>

<div>
    {{-- Header --}}
    <header class="flex justify-between">
        <h1 class="text-2xl font-bold dark:text-white">{{ __('New project') }}</h1>
        <flux:button
            :href="route('projects.index')"
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

            @include('livewire.projects.partials.form')

            <div class="flex gap-6 pt-3">
                <flux:button
                    :href="route('projects.index')"
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