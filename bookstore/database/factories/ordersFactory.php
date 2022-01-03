<?php

namespace Database\Factories;

use App\Models\orders;
use Illuminate\Database\Eloquent\Factories\Factory;

class ordersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = orders::class;

    public function definition()
    {
        return [
            'total_items' => 2,
            'created_at' => $this->faker->date()
        ];
    }
}
