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
            'dog_name' => $this->faker->name(),
            'dog_breed' => $this->faker->jobTitle(),

            $table->string('vardas');
            $table->string('pavarde');
            $table->string('tel_nr', 15);
            $table->string('pastas')->unique();
            $table->string('slaptazodis');
            $table->timestamps();
        ];
    }
}
