<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'name','headline','bio','avatar','socials'
    ];

    protected $casts = [
        'socials' => 'array',
    ];
}
