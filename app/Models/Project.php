<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model {
    protected $fillable = [
        'title',
        'type',
        'year',
        'description',
        'details',
        'image',
    ];
}