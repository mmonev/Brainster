<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Game;
use Illuminate\Console\Command;
 
class UpdateResults extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:results';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the results of all the games that ended in the last 24 hours.';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $dailyMatches = Game::where('start_time', Carbon::yesterday())->get();

        foreach ($dailyMatches as $match) {
            $match->home_team_goals = rand(0,9);
            $match->away_team_goals = rand(0,9);
            $match->save();
        }
    }
}
