<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'type',
        'location',
        'experience_level',
        'salary_range',
        'deadline',
        'description',
        'responsibilities',
        'requirements',
        'benefits',
        'is_active',
        'archived_at',
    ];

    protected $casts = [
        'deadline' => 'date',
        'is_active' => 'boolean',
        'archived_at' => 'datetime',
    ];

    public function applications(): HasMany
    {
        return $this->hasMany(JobApplication::class);
    }

    public function scopeOpen($query)
    {
        return $query
            ->where('is_active', true)
            ->whereNull('archived_at')
            ->where(function ($query) {
                $query->whereNull('deadline')->orWhereDate('deadline', '>=', now()->toDateString());
            });
    }

    public function scopeCurrent($query)
    {
        return $query->whereNull('archived_at');
    }

    public function scopeArchived($query)
    {
        return $query->whereNotNull('archived_at');
    }
}
