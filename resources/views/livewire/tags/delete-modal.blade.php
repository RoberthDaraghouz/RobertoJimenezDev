<?php

use App\Models\Tag;
use Livewire\Attributes\On;
use Livewire\Volt\Component;

new class extends Component {
    public Tag $tag;

    #[On('delete-tag')]
    public function setValues(Tag $tag): void {
        $this->tag = $tag;
    }

    public function delete(): void {
        try {
            $this->tag->delete();

            $this->modal('delete-tag')->close();
            $this->dispatch('tag-deleted');
        } catch (\Throwable $th) {
            dd(throw $th);
        }
    }
}; ?>

<flux:modal name="delete-tag" class="min-w-lg">
    <form wire:submit="delete" class="space-y-6">
        <div>
            <div class="text-xl text-slate-800 font-semibold dark:text-white">{{ __('Deletion confirmation') }}</div>
            <p class="text-center text-2xl py-6">
                @if ($tag)
                    {{ $tag->name }}
                @endif
            </p>
        </div>

        <div class="flex justify-center gap-3">
            <flux:modal.close>
                <flux:button
                    size="sm" >
                        {{ __('Cancel') }}
                </flux:button>
            </flux:modal.close>

            <flux:button
                variant="danger"
                size="sm"
                type="submit" >
                    {{ __('Delete') }}
            </flux:button>
        </div>
    </form>
</flux:modal>