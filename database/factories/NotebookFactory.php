<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Notebook>
 */
class NotebookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "fio" => fake()->firstName,
            "company" => fake()->company,
            "phone_number" => fake()->phoneNumber,
            "email" => fake()->email,
            "birthday" => fake()->date,
            "photo" => "123.jpg"
        ];
    }
}
