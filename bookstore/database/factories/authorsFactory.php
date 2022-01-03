<?php

namespace Database\Factories;

use App\Models\authors;
use Illuminate\Database\Eloquent\Factories\Factory;

class authorsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = authors::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            
        ];
    }
}
