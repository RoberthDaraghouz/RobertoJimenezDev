<?php

use App\Livewire\Forms\TagForm;
use Livewire\Volt\Component;

new class extends Component {
    public TagForm $form;

    public function save(): void {
        $this->form->store();

        $this->modal('new-tag')->close();
        $this->dispatch('tag-added');
    }
}; ?>

<div>
    <flux:modal.trigger name="new-tag">
        <flux:button
            icon="plus"
            size="sm" >
            {{ __('New tag') }}
        </flux:button>
    </flux:modal.trigger>

    <flux:modal name="new-tag" class="min-w-lg">
        <form wire:submit="save" class="space-y-6">
            <div>
                <div class="text-xl text-slate-800 font-semibold dark:text-white">{{ __('New tag') }}</div>
            </div>

            @include('livewire.tags.partials.form')

            <div class="flex justify-center gap-3">
                <flux:modal.close>
                    <flux:button
                        size="sm" >
                            {{ __('Cancel') }}
                    </flux:button>
                </flux:modal.close>

                <flux:button
                    variant="primary"
                    size="sm"
                    type="submit" >
                        {{ __('Save') }}
                </flux:button>
            </div>
        </form>
    </flux:modal>
</div>