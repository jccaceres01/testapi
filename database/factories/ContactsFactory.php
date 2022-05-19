<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contacts>
 */
class ContactsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->email(),
            'phone' => $this->faker->phoneNumber(),
            'birthdate' => $this->faker->dateTimeBetween('-40 year', '-13 years'),
            'address' => $this->faker->address(),
            'user_id' => \App\Models\User::inRandomOrder()->first()->id
        ];
    }
}
