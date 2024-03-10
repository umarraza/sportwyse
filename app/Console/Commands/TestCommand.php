<?php

namespace App\Console\Commands;

use Illuminate\Support\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $date = '01-01-2024';
        // $date = '2024-01-01';
        // $date = 'Thu Jan 01 2024 00:00:00 GMT+0000 (Coordinated Universal Time)';

        try {
            $date = Carbon::createFromFormat('D M d Y H:i:s e+', $date);
        } catch (\Throwable $th) {

            try {
                
                $date = Carbon::createFromFormat('Y-m-d', $date);
            
            } catch (\Throwable $th) {
                
                try {
                    $date = Carbon::createFromFormat('D M d Y H:i:s e+', $date);
                } catch (\Throwable $th) {
                    $date = null;
                    Log::error('Failed to parse both date formats.');
                }
            }
        }

        return $date;
    }
}
