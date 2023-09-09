<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class FavoriteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        
        $registing_id = User::all()->random(1)[0]->id;
        $registered_id = User::all()->random(1)[0]->id;
        
        //ユーザーidが同一であった場合の処理
        while (true) 
        {
            
            if ($registered_id == $registing_id)
            {
                $registered_id = User::all()->random(1)[0]->id;
            }else{
                break;
            }
        }
        
        return [
            'registing_id' => $registing_id,
            'registered_id' => $registered_id,
        ];
    }
}
