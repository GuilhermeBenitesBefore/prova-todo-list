<?php

use Illuminate\Database\Seeder;
use TodoList\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(CategoryTableSeeder::class);
    }
}


class CategoryTableSeeder extends Seeder
{
   
    public function run()
    {
        Category::create(['name' => "Casa"]);
        Category::create(['name' => "Animal"]);
        Category::create(['name' => 'Trabalho']);
        Category::create(['name' => "Compra"]);
        Category::create(['name' => "Outros"]);
        
    }
}

