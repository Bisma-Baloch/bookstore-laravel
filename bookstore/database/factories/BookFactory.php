<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Book::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'image' => $this->faker->image,
            'price' => $this->faker->randomNumber(2),
            'description' => $this->faker->text(50),
        ];
    }
}
