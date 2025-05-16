<?php

namespace App\Livewire\Forms;

use App\Models\Tag;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TagForm extends Form {
    public ?Tag $tag;

    #[Validate('required|max:100')]
    public string $name = '';

    #[Validate('required|max:7')]
    public string $color = '#024a71';

    public function setTag(Tag $tag): void {
        $this->tag = $tag;

        $this->name = $tag->name;
        $this->color = $tag->color;
    }

    public function store(): void {
        $this->validate();

        Tag::create($this->all());

        $this->name = '';
    }

    public function update(): void {
        $this->validate();

        $this->tag->update($this->all());

        $this->name = '';
    }
}