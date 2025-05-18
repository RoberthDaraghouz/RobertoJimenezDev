<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Project extends Model {
    protected $fillable = [
        'title',
        'type',
        'year',
        'description',
        'details',
        'image',
        'link_online',
        'link_demo',
        'link_github',
    ];

    public function tags(): BelongsToMany {
        return $this->belongsToMany(Tag::class, 'project_tag');
    }
}