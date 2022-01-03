<?php

namespace Tests\Feature;

use App\Models\authors;
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
        $author = authors::factory()->create();
        $this->get(route('authors.index'))
        ->assertOk()
        ->assertSee($author->name);
    }

    public function testCreate(){
        $this->get(route('authors.create'))
        ->assertOk()
        ->assertSeeText('Author Name');
    }   

    public function testStore(){
        $this->post(route('authors.store'),[
            'name' => 'Khalid Mehmood khan'
        ])
        ->assertSessionHasNoErrors()
        ->assertRedirect();

        $this->assertDatabaseHas(
            (new authors())->getTable(),
            [
                'name' => 'Khalid Mehmood khan'
            ]
        );
    }

    public function testEdit(){
        $author = authors::factory()->create();
        $this->get(route('authors.edit', $author->id))
        ->assertOk()
        ->assertSee($author->name);
    }

    public function testUpdate(){
        $author = authors::factory()->create();
        $this->put(route('authors.update', $author->id),[
            'name' => 'Khalid Mehmood khan'
        ])
        ->assertSessionHasNoErrors()
        ->assertRedirect();

        $this->assertDatabaseHas(
            (new authors())->getTable(),
            [
                'name' => 'Khalid Mehmood khan'
            ]
        );
    }   

    public function testDelete(){
        $author = authors::factory()->create();
        $this->get(route('authors.destroy', $author->id))
        ->assertOk();
    }
}
