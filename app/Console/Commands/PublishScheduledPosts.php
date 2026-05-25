<?php

namespace App\Console\Commands;

use App\Models\Blog;
use Illuminate\Console\Command;

class PublishScheduledPosts extends Command
{
    protected $signature   = 'blog:publish-scheduled';
    protected $description = 'Publish all scheduled blog posts whose publish time has arrived';

    public function handle(): int
    {
        $count = Blog::where('status', 'scheduled')
            ->where('published_at', '<=', now())
            ->update(['status' => 'published']);

        $this->info("Published {$count} scheduled post(s).");

        return Command::SUCCESS;
    }
}
