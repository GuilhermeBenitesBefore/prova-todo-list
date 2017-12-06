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
        $category = factory(Category::class)->create(["name" => 'casa']);
        $category->save();

        $category2 = factory(Category::class)->create(["name" => 'mesa']);
        $category2->save();

        $todo = factory(Todo::class)->create(["titulo" => 'titulo3', "category_id" =>$category->id ]);
        $todo->save();

        $todo = factory(Todo::class)->create(["titulo" => 'titulo4', "category_id" =>$category2->id ]);
        $todo->save();

        $quantidadeToDos = Todo::findToDosByCategoryId($category->id)->count();

        
        $this->assertfalse($quantidadeToDos == 2);
        
    }

    public function testfindToDosByDate()
    {
        $todo = factory(Todo::class)->create(["titulo" => 'titulo3', "vencimento" => "2015-07-29"]);
        $todo->save();

        $todo = factory(Todo::class)->create(["titulo" => 'titulo8']);
        $todo->save();

        $quantidadeToDos = Todo::findToDosBetweenDates("2017-07-28","2019-07-28")->count();

        $this->assertTrue($quantidadeToDos == 1);        
    }

}
