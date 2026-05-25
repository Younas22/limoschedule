<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Technology',
            'Business',
            'Travel',
            'Lifestyle',
            'Industry News',
            'Company Updates',
            'Tips & Tricks',
            'Case Studies',
        ];

        foreach ($categories as $name) {
            BlogCategory::updateOrCreate(
                ['slug' => Str::slug($name)],
                ['name' => $name]
            );
        }
    }
}
