<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'country',
        'city',
        'position',
        'experience_level',
        'years_of_experience',
        'linkedin',
        'portfolio',
        'github',
        'availability',
        'cover_letter',
        'resume_path',
        'resume_original_name',
        'consent',
    ];

    protected $casts = [
        'consent' => 'boolean',
    ];
}
