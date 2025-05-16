<?php

use App\Livewire\Forms\TagForm;
use App\Models\Tag;
use Livewire\Attributes\On;
use Livewire\Volt\Component;

new class extends Component {
    public TagForm $form;

    #[On('edit-tag')]
    public function setValues(Tag $tag): void {
        $this->form->setTag($tag);
    }

    public function save(): void {
        $this->form->update();

        $this->modal('edit-tag')->close();
        $this->dispatch('tag-updated');
    }
}; ?>

<flux:modal name="edit-tag" class="min-w-lg">
    <form wire:submit="save" class="space-y-6">
        <div>
            <div class="text-xl text-slate-800 font-semibold dark:text-white">{{ __('Edit tag') }}</div>
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
                    {{ __('Update') }}
            </flux:button>
        </div>
    </form>
</flux:modal>