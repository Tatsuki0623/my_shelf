<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Kind;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
     
    public function definition()
    {
        
        $user_id = User::all()->random(1)[0]->id;
        $kind_id = Kind::all()->random(1)[0]->id;
        
        return [
            'user_id' => $user_id,
            'kind_id' => $kind_id,
            'title' => fake()->word(),
            'volume' => fake()->numberBetween(1,150),
            'impression' => fake()->realText(),
            'point' => fake()->numberbetween(0,100),
            'image' => Str::random(60),
            'link_rakuten' => Str::random(60),
        ];
    }
}
