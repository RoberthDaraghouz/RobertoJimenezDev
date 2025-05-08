<?php

namespace App\Livewire\Forms;

use App\Models\Experience;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ExperienceForm extends Form {
    public ?Experience $experience;

    #[Validate('required|max:100')]
    public string $company;

    #[Validate('required|max:30')]
    public string $first_date;

    #[Validate('required|max:30')]
    public string $last_date;

    #[Validate('required|max:255')]
    public string $description;

    public function setExperience(Experience $experience): void {
        $this->experience = $experience;

        $this->company = $experience->company;
        $this->first_date = $experience->first_date;
        $this->last_date = $experience->last_date;
        $this->description = $experience->description;
    }

    public function store(): void {
        $this->validate();

        Experience::create($this->all());
    }

    public function update(): void {
        $this->validate();

        $this->experience->update($this->all());
    }
}