<?php

namespace Tests\Feature;


use App\Models\Category;
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
        $this->login();
        $category = Category::factory()->create();
        $this->get(route('categories.index'))
        ->assertOk()
        ->assertSee($category->name);
    }

    public function testCreate(){
        $this->login();
        $this->get(route('categories.create'))
        ->assertOk()
        ->assertSeeText('Category Name');
    }   

    public function testStore(){
        $this->login();
        $this->post(route('categories.store'),[
            'name' => 'Biology'
        ])
        ->assertSessionHasNoErrors()
        ->assertRedirect();

        $this->assertDatabaseHas(
            (new Category())->getTable(),
            [
                'name' => 'Biology'
            ]
        );
    }

    public function testEdit(){
        $this->login();
        $category = Category::factory()->create();
        $this->get(route('categories.edit', $category->id))
        ->assertOk()
        ->assertSee($category->name);
    }

    public function testUpdate(){
        $this->login();
        $category = Category::factory()->create();
        $this->put(route('categories.update', $category->id),[
            'name' => 'Biology'
        ])
        ->assertSessionHasNoErrors()
        ->assertRedirect();

        $this->assertDatabaseHas(
            (new Category())->getTable(),
            [
                'name' => 'Biology'
            ]
        );
    }   

    public function testDelete(){
        $this->login();
        $category = Category::factory()->create();
        $this->get(route('categories.destroy', $category->id))
        ->assertOk();
    }
}
