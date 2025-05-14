<?php

namespace App\Livewire\Forms;

use App\Models\Project;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\WithFileUploads;

class ProjectForm extends Form {
    use WithFileUploads;

    public ?Project $project;

    #[Validate('required|max:100')]
    public string $title;

    #[Validate('nullable|max:20')]
    public string $type;

    #[Validate('nullable|max:4')]
    public string $year;

    #[Validate('required|max:255')]
    public string $description;

    #[Validate('nullable|max:255')]
    public string $details;

    #[Validate('nullable|image|max:1024')] // 1MB MAX
    public $image;

    public bool $remove_old_image = false;

    public function setProject(Project $project): void {
        $this->project = $project;

        $this->title = $project->title;
        $this->type = $project->type;
        $this->year = $project->year;
        $this->description = $project->description;
        $this->details = $project->details;
    }

    public function store(): void {
        $this->validate();

        $image_url = $this->image->store('project_images');

        Project::create([
            'title'         => $this->title,
            'type'          => $this->type,
            'year'          => $this->year,
            'description'   => $this->description,
            'details'       => $this->details,
            'image'         => $image_url,
        ]);
    }

    public function update(): void {
        $this->validate();

        if ($this->image) {
            $image_url = $this->image->store('project_images');

            if ($this->project->image && Storage::exists($this->project->image)) {
                Storage::delete($this->project->image);
            }
        } else {
            if ($this->remove_old_image) {
                $image_url = null;

                if ($this->project->image && Storage::exists($this->project->image)) {
                    Storage::delete($this->project->image);
                }
            } else {
                $image_url = $this->project->image;
            }
        }

        $this->project->update([
            'title'         => $this->title,
            'type'          => $this->type,
            'year'          => $this->year,
            'description'   => $this->description,
            'details'       => $this->details,
            'image'         => $image_url,
        ]);
    }
}