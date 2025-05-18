<?php

use App\Models\Experience;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Volt\Component;

new class extends Component {
    public Collection $experiences;

    public function mount(): void {
        $this->experiences = Experience::orderBy('created_at', 'DESC')->get();
    }
}; ?>

<div>
    @if ($experiences->count())
        <x-layouts.home-section title="{{ __('Experience') }}">
            <div class="px-3 xl:px-0">
                <div class="max-w-7xl mx-auto grid gap-8">
                    @foreach ($experiences as $experience)
                        <x-card.experience :$experience />
                    @endforeach
                </div>
            </div>
        </x-layouts.home-section>
    @endif
</div>