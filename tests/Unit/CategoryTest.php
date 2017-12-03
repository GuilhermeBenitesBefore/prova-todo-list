<?php

namespace Tests\Unit;

use Tests\TestCase;

use TodoList\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;;

class CategoryTest extends TestCase
{
    use DatabaseMigrations;

    public function testfindToDosByDate()
    {
        $quantidadeToDos = Category::All()->count();

        // $this->assertTrue($quantidadeToDos == 4);        
    }

}
