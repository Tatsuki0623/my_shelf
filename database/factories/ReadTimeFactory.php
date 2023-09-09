<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ReadTime>
 */
class ReadTimeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user_id = User::all()->random(1)[0]->id;
        
        return [
            'user_id' => $user_id,
            'read_time' => fake()->numberBetween(0,24),
        ];
    }
}
