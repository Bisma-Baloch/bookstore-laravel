<?php

namespace Tests\Feature;

use App\Models\authors;
use App\Models\books;
use App\Models\categories;
use App\Models\orders;
use App\Models\orders_items;
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
        $user = User::factory()->create();
        $author = authors::factory()->create();
        $category = categories::factory()->create();
        $book = books::factory()->create(['author_id' => $author->id, 'category_id' => $category->id]);
        $order = orders::factory()->create(['user_id' =>$user->id, 'total_amount' => $book->price * 2 ]);
        $this->get(route('my-orders'))
        ->assertSee($order->total_amount)
        ->assertSee($order->total_quantiy);
    }

    public function testView()
    {
        $user = User::factory()->create();
        $author = authors::factory()->create();
        $category = categories::factory()->create();
        $book = books::factory()->create(['author_id' => $author->id, 'category_id' => $category->id]);
        $order = orders::factory()->create(['user_id' => $user->id, 'total_amount' => $book->price * 2]);
        $order_item = orders_items::factory()->create(['order_id' => $order->id, 'book_id' => $book->id]);
        $this->get(route('order-detail', $order->id))
        ->assertOk()
        ->assertSee($order_item->qty)
        ->assertSee($book->price)
        ->assertSee($book->image);
    }


}
