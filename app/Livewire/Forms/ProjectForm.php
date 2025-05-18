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
    public string $title = '';

    #[Validate('nullable|max:20')]
    public string $type = '';

    #[Validate('required|max:4')]
    public int $year;

    #[Validate('required|max:255')]
    public string $description = '';

    #[Validate('nullable|max:255')]
    public string $details = '';

    public array $tags = [];

    #[Validate('nullable|url|max:255')]
    public string $link_online = '';

    #[Validate('nullable|url|max:255')]
    public string $link_demo = '';

    #[Validate('nullable|url|max:255')]
    public string $link_github = '';

    #[Validate('nullable|image|max:1024')] // 1MB MAX
    public $image;

    public bool $remove_old_image = false;

    public function setProject(Project $project): void {
        $this->project = $project;

        $this->title        = $project->title;
        $this->type         = $project->type;
        $this->year         = $project->year;
        $this->description  = $project->description;
        $this->details      = $project->details;
        $this->link_online  = $project->link_online;
        $this->link_demo    = $project->link_demo;
        $this->link_github  = $project->link_github;

        foreach ($project->tags as $tag) {
            array_push($this->tags, $tag->id);
        }
    }

    public function store(): void {
        $this->validate();

        if ($this->image) {
            $image_url = $this->image->store('project_images');
        } else {
            $image_url = null;
        }

        $project = Project::create([
            'title'         => $this->title,
            'type'          => $this->type,
            'year'          => $this->year,
            'description'   => $this->description,
            'details'       => $this->details,
            'link_online'   => $this->link_online,
            'link_demo'     => $this->link_demo,
            'link_github'   => $this->link_github,
            'image'         => $image_url,
        ]);

        $project->tags()->attach($this->tags);
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
            'link_online'   => $this->link_online,
            'link_demo'     => $this->link_demo,
            'link_github'   => $this->link_github,
            'image'         => $image_url,
        ]);

        $this->project->tags()->sync($this->tags);
    }
}