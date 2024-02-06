<?php

namespace Database\Factories;

use App\Models\Vehicle;
use Faker\Provider\Fakecar;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Vehicle::class;

    public function definition(): array
    {
        $this->faker->addProvider(new Fakecar($this->faker));
        $vehicle = $this->faker->vehicleArray();

        return [
            'brand'           => $vehicle['brand'],
            'model'           => $vehicle['model'],
            'plate_number' => $this->faker->vehicleRegistration,
            'insurance_date' => date('Y:m:d', strtotime('+12 months'))
        ];
    } 
}
