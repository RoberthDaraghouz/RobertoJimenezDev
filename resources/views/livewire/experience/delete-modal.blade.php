<?php

use App\Models\Experience;
use Livewire\Volt\Component;

new class extends Component {
    public Experience $experience;

    public function delete(): void {
        try {
            $this->experience->delete();

            $this->modal('delete-experience-' . $this->experience->id)->close();
            $this->dispatch('experience-deleted');
        } catch (\Throwable $th) {
            dd(throw $th);
        }
    }
}; ?>


<div>
    <flux:modal.trigger name="delete-experience-{{ $experience->id }}">
        <flux:button
            variant="danger"
            size="sm" >
            {{ __('Delete') }}
        </flux:button>
    </flux:modal.trigger>

    <flux:modal name="delete-experience-{{ $experience->id }}" class="min-w-lg">
        <form wire:submit="delete" class="space-y-6">
            <div>
                <div class="text-xl text-slate-800 font-semibold dark:text-white">{{ __('Deletion confirmation') }}</div>
                <p class="text-center text-2xl py-6">
                    {{ $experience->company }}
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
</div>