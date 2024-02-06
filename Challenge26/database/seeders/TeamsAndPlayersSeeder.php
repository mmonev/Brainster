<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Team;
use App\Models\Player;
use App\Models\Game;

class TeamsAndPlayersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Creating 10 teams
        $teams = [];
        foreach (range(1, 10) as $index) {
            $team = Team::create([
                'name' => $faker->company,
                'founding_year' => $faker->year,
            ]);
            $teams[] = $team->id;

            // Creating 15 players for each team
            foreach (range(1, 15) as $index) {
                Player::create([
                    'team_id' => $team->id,
                    'name' => $faker->firstName,
                    'surname' => $faker->lastName,
                    'dob' => $faker->date,
                ]);
            }
        }

        // Creating games with results
        foreach (range(1, 20) as $index) {
            // Randomly selecting two different teams for a match
            $teamKeys = array_rand($teams, 2);
            $homeTeam = $teams[$teamKeys[0]];
            $awayTeam = $teams[$teamKeys[1]];

            Game::create([
                'home_team' => $homeTeam,
                'away_team' => $awayTeam,
                'home_team_goals' => $faker->numberBetween(0, 5),
                'away_team_goals' => $faker->numberBetween(0, 5),
                'game_date' => $faker->dateTimeBetween('-1 years', '+1 years'),
            ]);
        }
    }
}
