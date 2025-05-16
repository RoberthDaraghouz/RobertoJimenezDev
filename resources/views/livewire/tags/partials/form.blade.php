<flux:input
    wire:model="form.name"
    label="{{ __('Tag name') }}"
    badge="{{ __('Required') }}"
    autofocus />

<flux:input
    wire:model="form.color"
    label="{{ __('Color') }}"
    badge="{{ __('Required') }}"
    type="color" />