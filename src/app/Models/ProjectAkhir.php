<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ProjectAkhir extends Model
{
    protected $fillable = [
        'title',
        'description',
        'tags',
        'icon',
        'image',
        'background_gradient',
        'url',
        'is_featured',
        'is_published',
        'sort_order',
    ];

    protected $casts = [
        'tags' => 'array',
        'is_featured' => 'boolean',
        'is_published' => 'boolean',
        'sort_order' => 'integer',
    ];

    protected $attributes = [
        'is_featured' => false,
        'is_published' => true,
        'sort_order' => 0,
    ];

    /**
     * Keep tags safe even if Filament/browser sends a comma separated string.
     */
    public function setTagsAttribute(mixed $value): void
    {
        if (is_string($value)) {
            $value = array_values(array_filter(array_map('trim', explode(',', $value))));
        }

        $this->attributes['tags'] = json_encode($value ?: []);
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true);
    }

    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('sort_order')->orderByDesc('created_at');
    }

    public function getImageUrlAttribute(): ?string
    {
        if (! $this->image) {
            return null;
        }

        return Storage::disk('public')->url($this->image);
    }
}
