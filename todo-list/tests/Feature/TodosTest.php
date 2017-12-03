<?php

namespace Tests\Feature;

use App\Category;
use App\Todo;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class TodosTest extends TestCase
{
    use DatabaseMigrations;
    
    public function testViewingAllTodos()
    {
        $category = factory(Category::class)->create([
            'id' => 1,
            'name' => 'Leasure'
            ]);
        $category->save();

        $todo = factory(Todo::class)->create([
            'id' => 1, 
            'title' => 'My first todo', 
            'description' => 'This is my first todo!',
            'category_id' => $category->id,
            'deadline' => '2017-01-01'
            ]);
        
        $todo->save();

        $this->get('/')->assertSeeText('This is my first todo!');
    }

    public function testShouldNotPersistInvalidTodo() {
        $this->call('POST', '/add')->assertStatus(302);
    }
}
