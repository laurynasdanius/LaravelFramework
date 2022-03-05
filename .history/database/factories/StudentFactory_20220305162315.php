<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'vardas' => $this->faker->firstName(),
            'pavarde' => $this->faker->jobTitle(),
            'tel_nr' => $this->faker->jobTitle(),
            'pastas' => $this->faker->jobTitle(),
            'slaptazodis' => $this->faker->jobTitle(),
        ];
    }
}
