<?php

namespace Database\Factories;

use App\Models\Chirp;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Chirp>
 */
class ChirpFactory extends Factory
{
    protected $model = Chirp::class;

    public function definition()
    {
        $user = User::factory()->create();
        return [
            'message' => $this->faker->sentence,
            'user_id'=>$user->id
        ];
    }
}
