<?php

use App\Models\Tag;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\On;
use Livewire\Volt\Component;

new class extends Component {
    public Collection $tags;

    #[On('tag-added')]
    #[On('tag-updated')]
    #[On('tag-deleted')]
    public function mount(): void {
        $this->tags = Tag::orderBy('name')->get();
    }
}; ?>

<div>
    {{-- Header --}}
    <header class="flex justify-between items-center">
        <h1 class="text-2xl font-bold dark:text-white">{{ __('Tags') }}</h1>

        @livewire('tags.new-modal')
    </header>

    @livewire('tags.edit-modal')

    @livewire('tags.delete-modal')

    {{-- Results --}}
    <div class="py-6">
        @if ($tags->count())
            <div class="flex flex-wrap gap-3">
                @foreach ($tags as $tag)
                    <flux:dropdown wire:key="tag-{{ $tag->id }}">
                        <flux:button
                            icon:trailing="chevron-down"
                            size="sm"
                            class="border-0 text-white"
                            style="background-color: {{ $tag->color }} !important">
                                {{ $tag->name }}
                                <span class="bg-white h-4 w-4 text-zinc-600 text-xs font-bold flex justify-center items-center rounded-full">
                                    {{ $tag->projects->count() }}
                                </span>
                        </flux:button>

                        <flux:menu>
                            <flux:modal.trigger
                                name="edit-tag"
                                @click="$dispatch('edit-tag', { tag: {{ $tag->id }}})">
                                    <flux:menu.item
                                        icon="pencil-square">
                                            {{ __('Edit') }}
                                    </flux:menu.item>
                            </flux:modal.trigger>

                            <flux:modal.trigger
                                name="delete-tag"
                                @click="$dispatch('delete-tag', { tag: {{ $tag->id }}})">
                                    <flux:menu.item
                                        icon="trash"
                                        variant="danger">
                                            {{ __('Delete') }}
                                    </flux:menu.item>
                            </flux:modal.trigger>
                        </flux:menu>
                    </flux:dropdown>
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
