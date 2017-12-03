<?php

namespace Tests\Feature;

use Tests\TestCase;
use TodoList\Todo;
use TodoList\Category;
use Illuminate\Foundation\Testing\DatabaseMigrations;;

use Illuminate\Foundation\Testing\RefreshDatabase;

class ToDoTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreateAToDo()
    {
        $todo = factory(Todo::class)->create(["titulo" => 'titulo3']);
        $category = factory(Category::class)->create(["name" => 'casa']);
        $todo->category()->save($category);
        $this->get('/Todo')->assertSeeText('casa');
    }
}
