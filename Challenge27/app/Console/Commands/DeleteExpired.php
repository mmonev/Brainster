<?php

namespace App\Console\Commands;

use App\Models\Vehicle;
use Illuminate\Console\Command;

class DeleteExpired extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:expired';

    /** 
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete from Database vehicles that are deleted and have expired insurance.';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
       Vehicle::onlyTrashed()->where('insurance_date', '<', date('Y-m-d H:i:s', strtotime('today')))->forceDelete();
      
    }
}
