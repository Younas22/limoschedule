<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class TestCronJob extends Command
{
    protected $signature   = 'cron:test';
    protected $description = 'Test cron job - runs every minute and logs a message';

    public function handle(): int
    {
        $message = 'Test cron job ran at: ' . now()->format('Y-m-d H:i:s');

        Log::channel('daily')->info($message);

        $this->info($message);

        return Command::SUCCESS;
    }
}
