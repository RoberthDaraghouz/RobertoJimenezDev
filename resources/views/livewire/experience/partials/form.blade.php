<flux:input
    wire:model="form.company"
    label="{{ __('Company name') }}"
    badge="{{ __('Required') }}" />

<div class="md:grid md:grid-cols-2 space-y-6 md:space-y-0 gap-6">
    <flux:input
        wire:model="form.first_date"
        label="{{ __('Start date') }}"
        badge="{{ __('Required') }}"
        placeholder="Ej. Enero 2019" />

    <flux:input
        wire:model="form.last_date"
        label="{{ __('End date') }}"
        badge="{{ __('Required') }}"
        placeholder="Ej. Diciembre 2020" />
</div>

<flux:textarea
    wire:model="form.description"
    label="{{ __('Description') }}"
    badge="{{ __('Required') }}" />