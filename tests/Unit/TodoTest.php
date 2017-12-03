<?php

namespace Tests\Unit;

use Tests\TestCase;
use TodoList\Todo;
use TodoList\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;;

class TodoTest extends TestCase
{
    use DatabaseMigrations;

    public function testfindToDoByCategory()
    {
        $todo = factory(Todo::class)->create(["titulo" => 'titulo3']);
        $category = factory(Category::class)->create(["name" => 'casa']);

        $todo->category()->save($category);

        $todoFound = Todo::findToDoByCategoryId($category->id);

        
        $this->assertTrue($todo->id, $todoFound->id );
        
    }
}
