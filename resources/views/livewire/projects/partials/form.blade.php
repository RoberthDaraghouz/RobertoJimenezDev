<flux:input
    wire:model="form.title"
    label="{{ __('Project title') }}"
    badge="{{ __('Required') }}" />

<div class="md:grid md:grid-cols-2 space-y-6 md:space-y-0 gap-6">
    <flux:input
        wire:model="form.type"
        label="{{ __('Type') }}"
        placeholder="Ej. Laboral, Personal, Académico" />

    <flux:input
        wire:model="form.year"
        type="number"
        min="1900"
        max="{{ date('Y') }}"
        step="1"
        value="{{ date('Y') }}"
        label="{{ __('Year') }}"
        class:input="text-end" />
</div>

<flux:textarea
    wire:model="form.description"
    badge="{{ __('Required') }}"
    label="{{ __('Description') }}"
    placeholder="Ej. Sistema para la gestión de proyectos..." />

<flux:textarea
    wire:model="form.details"
    label="{{ __('Details') }}"
    placeholder="Ej. Implementación de pasarela de pagos, autenticación de usuarios, etc." />

<flux:input
    wire:model="form.image"
    type="file"
    label="{{ __('Image') }}"
    size="sm" />

@if ($form->image)
    <flux:button
        wire:click="removeCurrentImage"
        variant="danger"
        size="sm"
        type="button">
        {{ __('Remove image') }}
    </flux:button>

    <img src="{{ $form->image->temporaryUrl() }}" class="rounded-lg shadow" alt="Project image">
@else
    {{-- Only in Update Component --}}
    @isset ($form->project)
        @if ($form->remove_old_image == false && $form->project->image)
            <flux:button
                wire:click="removeOldImage"
                variant="danger"
                size="sm"
                type="button">
                {{ __('Remove current image') }}
            </flux:button>

            @if (Storage::exists($form->project->image))
                <img src="{{ Storage::url($form->project->image) }}" class="rounded-lg shadow" alt="Project image">
            @else
                <flux:callout
                    heading="{{ __('Information') }}"
                    icon="information-circle"
                    color="purple"
                    variant="secondary">
                        <flux:callout.text>
                            {{ __('Image not found.') }}
                        </flux:callout.text>
                </flux:callout>
            @endif
        @endif
    @endif
@endif