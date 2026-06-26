<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_id',
        'name',
        'email',
        'phone',
        'current_company',
        'experience',
        'portfolio_url',
        'resume_path',
        'resume_original_name',
        'cover_letter',
        'status',
    ];

    public function job(): BelongsTo
    {
        return $this->belongsTo(Job::class);
    }
}
