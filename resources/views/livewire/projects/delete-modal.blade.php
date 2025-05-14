<?php

use App\Models\Project;
use Livewire\Volt\Component;

new class extends Component {
    public Project $project;

    public function delete(): void {
        try {
            $this->project->delete();

            $this->modal('delete-project-' . $this->project->id)->close();
            $this->dispatch('project-deleted');
        } catch (\Throwable $th) {
            dd(throw $th);
        }
    }
}; ?>

<div>
    <flux:modal.trigger name="delete-project-{{ $project->id }}">
        <flux:button
            variant="danger"
            size="sm" >
            {{ __('Delete') }}
        </flux:button>
    </flux:modal.trigger>

    <flux:modal name="delete-project-{{ $project->id }}" class="min-w-lg">
        <form wire:submit="delete" class="space-y-6">
            <div>
                <div class="text-xl text-slate-800 font-semibold dark:text-white">{{ __('Deletion confirmation') }}</div>
                <p class="text-center text-2xl py-6">
                    {{ $project->title }}
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