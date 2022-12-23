<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class postFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->id,
            'userId' => $this->faker->userId,
            'title' => $this->faker->title,
            'completed' => $this->faker->completed,

        ];
    }
}
