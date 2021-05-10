<?php

namespace Database\Factories;

use App\Models\Expense;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExpenseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Expense::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->realText($this->faker->numberBetween(15,30)),
            'cost' => $this->faker->numberBetween(10,100),
            'trip_id' => \App\Models\Trip::all()->random()->id
        ];
    }
}
