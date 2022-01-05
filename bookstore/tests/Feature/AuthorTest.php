<?php

namespace Tests\Feature;

use App\Models\Author;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthorTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testAuthor()
    {
        $this->login();
        $author = Author::factory()->create(['name' => 'ali']);
        file_put_contents("r.html",$this->get(route('authors.index'))->getContent());
        $this->get(route('authors.index'))
        ->assertOk()
        ->assertSee($author->name);
    }

    public function testCreate(){
        $this->login();
        $this->get(route('authors.create'))
        ->assertOk()
        ->assertSeeText('Author Name');
    }   

    public function testStore(){
        $this->login();
        $this->post(route('authors.store'),[
            'name' => 'Khalid Mehmood khan'
        ])
        ->assertSessionHasNoErrors()
        ->assertRedirect();

        $this->assertDatabaseHas(
            (new Author())->getTable(),
            [
                'name' => 'Khalid Mehmood khan'
            ]
        );
    }

    public function testEdit(){
        $this->login();
        $author = Author::factory()->create();
        $this->get(route('authors.edit', $author->id))
        ->assertOk()
        ->assertSee($author->name);
    }

    public function testUpdate(){
        $this->login();
        $author = Author::factory()->create();
        $this->put(route('authors.update', $author->id),[
            'name' => 'Khalid Mehmood khan'
        ])
        ->assertSessionHasNoErrors()
        ->assertRedirect();

        $this->assertDatabaseHas(
            (new Author())->getTable(),
            [
                'name' => 'Khalid Mehmood khan'
            ]
        );
    }   

    public function testDelete(){
        $this->login();
        $author = Author::factory()->create();
        $this->get(route('authors.destroy', $author->id))
        ->assertOk();
    }
}
