<?php

use App\Models\Project;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\On;
use Livewire\Volt\Component;

new class extends Component {
    public Collection $projects;

    #[On('project-deleted')]
    public function mount(): void {
        $this->projects = Project::orderBy('created_at', 'DESC')->get();
    }
}; ?>

<div>
    {{-- Header --}}
    <header class="flex justify-between items-center">
        <h1 class="text-2xl font-bold dark:text-white">{{ __('Projects') }}</h1>
        <flux:button
            :href="route('projects.new')"
            icon="plus"
            size="sm"
            wire:navigate>
            <span class="hidden md:block">
                {{ __('New project') }}
            </span>
        </flux:button>
    </header>

    {{-- Results --}}
    <div class="py-6">
        @if ($projects->count())
            <div class="grid lg:grid-cols-2 gap-6">
                @foreach ($projects as $project)
                    <x-card.project :$project optional_buttons />
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