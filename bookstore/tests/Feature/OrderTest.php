<?php

namespace Tests\Feature;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testListing()
    {
        $this->login();
        $user = User::factory()->create();
        $author = Author::factory()->create();
        $category = Category::factory()->create();
        $book = Book::factory()->create(['author_id' => $author->id, 'category_id' => $category->id]);
        $order = Order::factory()->create(['user_id' =>$user->id, 'total_amount' => $book->price * 2 ]);
        $this->get(route('my-orders'))
        ->assertOk()
        ->assertSee($order->total_quantiy);
    }

    public function testView()
    {
        $this->login();
        $user = User::factory()->create();
        $author = Author::factory()->create();
        $category = Category::factory()->create();
        $book = Book::factory()->create(['author_id' => $author->id, 'category_id' => $category->id]);
        $order = Order::factory()->create(['user_id' => $user->id, 'total_amount' => $book->price * 2]);
        $order_item = OrderItem::factory()->create(['order_id' => $order->id, 'book_id' => $book->id]);
        $this->get(route('order-detail', $order->id))
        ->assertOk()
        ->assertSee($order_item->qty)
        ->assertSee($book->price)
        ->assertSee($book->image);
    }
}
