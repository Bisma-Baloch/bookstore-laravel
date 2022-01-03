<?php

namespace Database\Factories;

use App\Models\orders_items;
use Illuminate\Database\Eloquent\Factories\Factory;

class orders_itemsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = orders_items::class;

    public function definition()
    {
        return [
            'qty' => 2,
        ];
    }
}
