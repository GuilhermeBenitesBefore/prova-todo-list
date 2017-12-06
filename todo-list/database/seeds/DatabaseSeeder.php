<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Category::create(['name' => "Trabalho"]);
        App\Category::create(['name' => "Lazer"]);
        App\Category::create(['name' => "Casa"]);
        App\Category::create(['name' => "Financeiro"]);

        $todo = App\Todo::create([
            'category_id' => 1,
            'title' => "Minha primeira tarefa",
            'description' => "Teste para desenvolvedor na Before. Criar uma aplicação de 'todo-list'.",
            'deadline' => "2017-12-03"
            ]);
    }
}