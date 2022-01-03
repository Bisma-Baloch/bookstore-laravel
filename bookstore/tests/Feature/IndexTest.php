<?php

namespace Tests\Feature;

use App\Models\authors;
use App\Models\books;
use App\Models\categories;
use Carbon\Factory;
use Database\Factories\booksFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IndexTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndex()
    {
        $author = authors::factory()->create();
        $category = categories::factory()->create();
        $book = books::factory()->create(['category_id' => $category->id, 'author_id' => $author->id]);

        $this->get(route('index'))
            ->assertOk()
            ->assertSee($book->name)
            ->assertSee($author->name)
            ->assertSee($book->price);
    }

    public function testCreate()
    {
        $this->get(route('books.create'))
            ->assertOk()
            ->assertSeeText('Book Name')
            ->assertSeeText('Author')
            ->assertSeeText('Category')
            ->assertSeeText('Price')
            ->assertSeeText('Image')
            ->assertSeeText('Description');
    }

    public function testEdit()
    {
        $author = authors::factory()->create();
        $category = categories::factory()->create();
        $book = books::factory()->create(['category_id' => $category->id, 'author_id' => $author->id]);

        $this->get(route('books.edit', $book->id))
            ->assertOk()
            ->assertSee($book->name)
            ->assertSeeText('Book Name')
            ->assertSee($book->price)
            ->assertSee($book->description)
            ->assertSee($category->name)
            ->assertSee($author->name);
    }

    public function testDelete()
    {
        $author = authors::factory()->create();
        $category = categories::factory()->create();
        $book = books::factory()->create(['category_id' => $category->id, 'author_id' => $author->id]);
        $this->get(route('books.destroy', $book->id))
            ->assertOk();
    }

    public function testUpdate()
    {
        $author = authors::factory()->create();
        $category = categories::factory()->create();
        $book = books::factory()->create(['category_id' => $category->id, 'author_id' => $author->id]);
        $this->put(route('books.update', $book->id), [
            'name' => 'Biology',
            'image' => 'img/bio.png',
            'price' => '750',
            'description' => 'Biology is a branch of science that deals with living organisms and their vital processes. Biology encompasses diverse fields, including botany, conservation, ecology, evolution, genetics, marine biology, medicine, microbiology, molecular biology, physiology, and zoology.',
            'category_id' => $category->id,
            'author_id' => $author->id
        ])
            ->assertSessionHasNoErrors()
            ->assertRedirect();

        $this->assertDatabaseHas(
            (new books())->getTable(),
            [
                'name' => 'Biology',
                'image' => 'img/bio.png',
                'price' => '750',
                'description' => 'Biology is a branch of science that deals with living organisms and their vital processes. Biology encompasses diverse fields, including botany, conservation, ecology, evolution, genetics, marine biology, medicine, microbiology, molecular biology, physiology, and zoology.',
                'category_id' => $category->id,
                'author_id' => $author->id
            ]
        );
    }

    public function testStore()
    {

        $author = authors::factory()->create();
        $category = categories::factory()->create();
        $book = books::factory()->create(['category_id' => $category->id, 'author_id' => $author->id]);
        $this->post(route('books.store'), [
            'name' => 'Biology',
            'image' => 'img/bio.png',
            'price' => '750',
            'description' => 'Biology is a branch of science that deals with living organisms and their vital processes. Biology encompasses diverse fields, including botany, conservation, ecology, evolution, genetics, marine biology, medicine, microbiology, molecular biology, physiology, and zoology.',
            'category_id' => $category->id,
            'author_id' => $author->id
        ])
            ->assertSessionHasNoErrors()
            ->assertRedirect();

        $this->assertDatabaseHas(
            (new books())->getTable(),
            [
                'name' => 'Biology',
                'image' => 'img/bio.png',
                'price' => '750',
                'description' => 'Biology is a branch of science that deals with living organisms and their vital processes. Biology encompasses diverse fields, including botany, conservation, ecology, evolution, genetics, marine biology, medicine, microbiology, molecular biology, physiology, and zoology.',
                'category_id' => $category->id,
                'author_id' => $author->id
            ]
        );
    }
}
