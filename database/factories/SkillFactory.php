<?php

namespace Database\Factories;

use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SkillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     * @throws Exception
     */
    public function definition(): array
    {
        return [
            'skill' => $this->faker->word(),
            'years_experience' => $this->faker->numberBetween(1,20),
            'seniority_rating_id' => $this->faker->numberBetween(1, 3),
            'employee_id' => $this->faker->numberBetween(1, 15)
        ];
    }
}
