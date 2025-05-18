<?php

use App\Models\Project;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Volt\Component;

new class extends Component {
    public Collection $projects;

    public function mount(): void {
        $this->projects = Project::orderBy('created_at', 'DESC')->get();
    }
}; ?>

<div>
    @if (!$projects->count())
        <x-layouts.home-section title="{{ __('Projects') }}">
            <div class="px-3 xl:px-0">
                <div class="max-w-7xl mx-auto grid lg:grid-cols-2 gap-8">
                    @foreach ($projects as $project)
                        <x-card.project :$project />
                    @endforeach
                </div>
            </div>
        </x-layouts.home-section>
    @endif
</div>