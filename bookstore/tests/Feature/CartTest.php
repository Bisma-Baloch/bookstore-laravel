<?php

namespace Tests\Feature;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CartTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testAddToCart()
    {
        $author = Author::factory()->create();
        $category = Category::factory()->create();
        $book = Book::factory()->create(['category_id' => $category->id, 'author_id' => $author->id]);

        $this->post(route('cart-add'), [
            'name' => $book->name,
            'image' => $book->image,
            'price' => $book->price,
            'author_id' => $author->id,
            'book_id' => $book->id
        ])
            ->assertSessionHasNoErrors()
            ->assertRedirect();
    }

    public function testCart()
    {
        $this->login();
        $author = Author::factory()->create();
        $category = Category::factory()->create();
        $book = Book::factory()->create(['category_id' => $category->id, 'author_id' => $author->id]);

        session()->put('cartItems', [
            'name' => $book->name,
            'image' => $book->image,
            'price' => $book->price,
            'author_id' => $author->id,
            'book_id' => $book->id
        ]);

        $this->get(route('cart'))
            ->assertSee($book->name)
            ->assertSee($book->price);
    }

    public function testCartDelete()
    {
        $author = Author::factory()->create();
        $category = Category::factory()->create();
        $book = Book::factory()->create(['category_id' => $category->id, 'author_id' => $author->id]);
        session()->put('cartItems', [
            'name' => $book->name,
            'image' => $book->image,
            'price' => $book->price,
            'author_id' => $author->id,
            'book_id' => $book->id
        ]);
        $this->post(route('delete', 0))
            ->assertDontSee($book->name)
            ->assertDontSee($book->price);
    }
}
