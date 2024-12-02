<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class FlushSessions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'session:flush';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Flush all stored user sessions in the app';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $driver = config('session.driver');

        match ($driver) {
            'database' => $this->cleanDB(),
            'file' => $this->cleanFile(),
            default => $this->error("\nNo provided method for clearing sessions with the {$driver} driver!"),
        };
    }

    /**
     * Flush all file based user sessions
     */
    protected function cleanFile(): void
    {
        $directory = config('session.files');
        $ignoreFiles = ['.gitignore', '.', '..'];

        $files = scandir($directory);

        if (! $files) {
            $this->error('Failed accessing session directory!');

            return;
        }

        foreach ($files as $file) {
            if (! in_array($file, $ignoreFiles)) {
                unlink($directory . '/' . $file);
            }
        }

        $this->info("\nSuccessfully flushed all stored user sessions!");
    }

    /**
     * Flush all database based user sessions
     */
    protected function cleanDB(): void
    {
        $table = config('session.table');
        DB::table($table)->truncate();

        $this->info("\nSuccessfully flushed all stored user sessions!");
    }
}
