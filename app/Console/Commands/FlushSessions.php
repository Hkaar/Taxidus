<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\DB;
use Illuminate\Console\Command;

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
    public function handle()
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
     * 
     * @return void
     */
    protected function cleanFile()
    {
        $directory = config('session.files');
        $ignoreFiles = ['.gitignore', '.', '..'];

        $files = scandir($directory);

        foreach ( $files as $file ) {
            if( !in_array($file,$ignoreFiles) ) {
                unlink($directory . '/' . $file);
            }
        }

        $this->info("\nSuccessfully flushed all stored user sessions!");
    }

    /**
     * Flush all database based user sessions
     * 
     * @return void
     */
    protected function cleanDB()
    {
        $table = config('session.table');
        DB::table($table)->truncate();

        $this->info("\nSuccessfully flushed all stored user sessions!");
    }
}
