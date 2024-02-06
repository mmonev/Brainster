<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Vehicle;
use Faker\Provider\Fakecar;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VehicleSeeder extends Seeder
{
  
    /** 
     * Run the database seeds.
     */
    
    public function run(): void
    {
        Vehicle::factory()->count(10)->create();
    }
}
