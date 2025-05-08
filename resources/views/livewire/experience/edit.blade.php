<?php

use App\Livewire\Forms\ExperienceForm;
use App\Models\Experience;
use Livewire\Volt\Component;

new class extends Component {
    public ExperienceForm $form;

    public function mount(Experience $experience): void {
        $this->form->setExperience($experience);
    }

    public function save(): void {
        $this->form->update();

        $this->redirectRoute('experience.index', navigate: true);
    }
}; ?>

<div>
    {{-- Header --}}
    <header class="flex justify-between">
        <h1 class="text-2xl">Editar experiencia</h1>
        <x-button.link variant="secondary" :href="route('experience.index')" wire:navigate>
            <flux:icon.chevron-left class="size-4" />
            Atrás
        </x-button.link>
    </header>

    {{-- Form --}}
    <div class="py-6 max-w-3xl">
        <form wire:submit="save" class="space-y-6">
            @include('livewire.experience.partials.form')

            <div class="flex gap-6">
                <x-button.link variant="secondary" :href="route('experience.index')" wire:navigate>Cancelar</x-button.link>
                <x-button variant="primary" type="submit" class="w-full">Actualizar</x-button>
            </div>
        </form>
    </div>
</div>