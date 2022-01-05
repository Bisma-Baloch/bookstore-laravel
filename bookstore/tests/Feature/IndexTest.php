<?php

namespace Tests\Feature;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
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
        $author = Author::factory()->create();
        $category = Category::factory()->create();
        $book = Book::factory()->create(['category_id' => $category->id, 'author_id' => $author->id]);

        $this->get(route('index'))
            ->assertOk()
            ->assertSee($book->name)
            ->assertSee($author->name)
            ->assertSee($book->price);
    }

    public function testCreate()
    {
        $this->login();
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
        $this->login();
        $author = Author::factory()->create();
        $category = Category::factory()->create();
        $book = Book::factory()->create(['category_id' => $category->id, 'author_id' => $author->id]);

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
        $this->login();
        $author = Author::factory()->create();
        $category = Category::factory()->create();
        $book = Book::factory()->create(['category_id' => $category->id, 'author_id' => $author->id]);
        $this->get(route('books.destroy', $book->id))
            ->assertOk();
    }

    public function testUpdate()
    {
        $this->login();
        $author = Author::factory()->create();
        $category = Category::factory()->create();
        $book = Book::factory()->create(['category_id' => $category->id, 'author_id' => $author->id]);
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
            (new Book())->getTable(),
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
        $this->login();
        $author = Author::factory()->create();
        $category = Category::factory()->create();
        $book = Book::factory()->create(['category_id' => $category->id, 'author_id' => $author->id]);
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
            (new Book())->getTable(),
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
