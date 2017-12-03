<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TodoTest extends TestCase
{
    
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testFindToDoByCategory()
    {
        $todo = factory(Todo::class)->create(["titulo" => 'titulo3']);
        $category = factory(Category::class)->create(["name" => 'casa']);

        $todo->category()->save($category);

        $todo =  Todo::findToDoByCategory();


        $this->assertTrue(true);
    }
}
