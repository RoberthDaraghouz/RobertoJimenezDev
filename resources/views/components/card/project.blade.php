@props([
    'project' => null,
    'optional_buttons' => false
])

<div class="border-1 border-zinc-100 rounded-2xl bg-white shadow-lg h-fit overflow-hidden dark:bg-zinc-900 dark:border-zinc-800">
    @if ($project->image)
        @if (Storage::exists($project->image))
            <div class="h-60">
                <img src="{{ Storage::url($project->image) }}" class="object-cover object-top w-full h-full" alt="Project image">
            </div>
        @else
            <div class="h-60 flex justify-center items-center bg-sky-900 text-sky-800">
                <flux:icon.camera class="size-32" />
            </div>
        @endif
    @else
        <div class="h-60 flex justify-center items-center bg-sky-900 text-sky-800">
            <flux:icon.camera class="size-32" />
        </div>
    @endif

    {{-- Content --}}
    <div class="py-4 px-6 space-y-4 relative">
        <div>
            <h3 class="text-zinc-800 text-2xl font-bold dark:text-white">{{ $project->title }}</h3>

            <p class="text-zinc-400 text-sm dark:text-white/70">
                {{ $project->type }}
                <span class="mx-1">·</span>
                {{ $project->year }}
            </p>
        </div>
        <div class="text-zinc-700 font-light space-y-4 dark:text-white/70">
            <p>
                {{ $project->description }}
            </p>

            <p>
                {{ $project->details }}
            </p>

            <div class="flex gap-2 flex-wrap">
                @foreach ($project->tags as $tag)
                    <flux:badge
                        class="!text-white !py-0.5"
                        variant="pill"
                        style="background-color: {{ $tag->color }}">
                            {{ $tag->name }}
                    </flux:badge>
                @endforeach
            </div>

            @if ($optional_buttons)
                <div class="flex gap-2 mt-4">
                    <flux:button
                        :href="route('projects.edit', $project)"
                        size="sm"
                        wire:navigate >
                            {{ __('Edit') }}
                    </flux:button>
        
                    @livewire('projects.delete-modal', ['project' => $project], key('delete-project-' . $project->id))
                </div>
            @endif
        </div>
    </div>

    {{-- Footer buttons --}}
    @if ($project->link_online || $project->link_demo || $project->link_github)
        <flux:button.group class="bg-zinc-100 dark:bg-zinc-800/50">
            @if ($project->link_online)
                <flux:button
                    href="{{ $project->link_online }}"
                    target="_blank"
                    icon="globe-americas"
                    variant="ghost"
                    class="w-full rounded-none">
                        Online
                </flux:button>
            @endif

            @if ($project->link_demo)
                <flux:button
                    href="{{ $project->link_demo }}"
                    target="_blank"
                    icon="rocket-launch"
                    variant="ghost"
                    class="w-full rounded-none">
                        Demo
                </flux:button>
            @endif

            @if ($project->link_github)
                <flux:button
                    href="{{ $project->link_github }}"
                    target="_blank"
                    icon="github"
                    variant="ghost"
                    class="w-full rounded-none">
                        Github
                </flux:button>
            @endif
        </flux:button.group>
    @endif
</div>