<?php

namespace Database\Factories;

use App\Models\Trip;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Illuminate\Support\Str;

class TripFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Trip::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence($nbWords = 2, $variableNbWords = true),
            'city' => $this->faker->city,
            'state' => $this->faker->state,
            'start_date' => $this->faker->dateTime($max = 'now', $timezone = null),
            'end_date' => $this->faker->dateTime($max = 'now', $timezone = null),
            'organizer' => User::all()->random()->id,
            'trip_token' => Str::random(16)
        ];
    }
}
