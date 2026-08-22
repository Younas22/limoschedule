<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class JobOpening extends Model
{
    protected $fillable = [
        'title', 'slug', 'department', 'location', 'employment_type',
        'experience_level', 'short_description', 'about_role',
        'responsibilities', 'requirements', 'nice_to_have',
        'what_youll_work_on', 'status', 'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function scopeOpen($query)
    {
        return $query->where('status', 'open');
    }

    /** Map our employment_type value to schema.org's JobPosting employmentType enum. */
    public function schemaEmploymentType(): string
    {
        return match ($this->employment_type) {
            'Full-time'  => 'FULL_TIME',
            'Part-time'  => 'PART_TIME',
            'Contract'   => 'CONTRACTOR',
            'Internship' => 'INTERN',
            default      => 'OTHER',
        };
    }

    /** Split a newline-separated textarea field into a clean bullet list. */
    public function bullets(string $field): array
    {
        $value = $this->{$field};
        if (empty($value)) {
            return [];
        }

        return collect(explode("\n", $value))
            ->map(fn ($line) => trim($line))
            ->filter()
            ->values()
            ->all();
    }

    public static function generateSlug(string $title, ?int $excludeId = null): string
    {
        $slug = Str::slug($title);
        $original = $slug;
        $i = 1;

        while (
            static::where('slug', $slug)
                ->when($excludeId, fn ($q) => $q->where('id', '!=', $excludeId))
                ->exists()
        ) {
            $slug = $original . '-' . $i++;
        }

        return $slug;
    }
}
