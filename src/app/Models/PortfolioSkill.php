<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioSkill extends Model
{
    protected $fillable = ['name','subtitle','icon','color','sort_order','is_active'];

    protected $casts = ['is_active' => 'boolean'];
}
