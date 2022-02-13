<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ExpenseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $date = $this->faker->dateTimeBetween('720- day' );
        return [
            'amount' => $this->faker->numberBetween(10, 60),
            'created_at' => $date,
        ];
    }
}
