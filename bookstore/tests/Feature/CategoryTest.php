<?php

namespace Tests\Feature;

use App\Models\categories;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testcategory()
    {
        $category = categories::factory()->create();
        $this->get(route('categories.index'))
        ->assertOk()
        ->assertSee($category->name);
    }

    public function testCreate(){
        $this->get(route('categories.create'))
        ->assertOk()
        ->assertSeeText('Category Name');
    }   

    public function testStore(){
        $this->post(route('categories.store'),[
            'name' => 'Biology'
        ])
        ->assertSessionHasNoErrors()
        ->assertRedirect();

        $this->assertDatabaseHas(
            (new categories())->getTable(),
            [
                'name' => 'Biology'
            ]
        );
    }

    public function testEdit(){
        $category = categories::factory()->create();
        $this->get(route('categories.edit', $category->id))
        ->assertOk()
        ->assertSee($category->name);
    }

    public function testUpdate(){
        $category = categories::factory()->create();
        $this->put(route('categories.update', $category->id),[
            'name' => 'Biology'
        ])
        ->assertSessionHasNoErrors()
        ->assertRedirect();

        $this->assertDatabaseHas(
            (new categories())->getTable(),
            [
                'name' => 'Biology'
            ]
        );
    }   

    public function testDelete(){
        $category = categories::factory()->create();
        $this->get(route('categories.destroy', $category->id))
        ->assertOk();
    }
}
