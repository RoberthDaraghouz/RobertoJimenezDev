<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model {
    protected $fillable = [
        'company',
        'first_date',
        'last_date',
        'description'
    ];
}