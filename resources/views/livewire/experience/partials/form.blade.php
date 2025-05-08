<flux:input wire:model="form.company"
    label="Nombre de la empresa"
    badge="Obligatorio" />

<div class="md:grid md:grid-cols-2 space-y-6 md:space-y-0 gap-6">
    <flux:input wire:model="form.first_date"
        label="Fecha inicial"
        badge="Obligatorio"
        placeholder="Ej. Enero 2019" />

    <flux:input wire:model="form.last_date"
        label="Fecha final"
        badge="Obligatorio"
        placeholder="Ej. Diciembre 2020" />
</div>

<flux:textarea
    wire:model="form.description"
    badge="Obligatorio"
    label="Descripción del empleo" />