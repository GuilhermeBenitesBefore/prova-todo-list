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
    
    public function setUp(){
        parent::setUp();

        $leasureCategory = factory(Category::class)->create([
            'id' => 1,
            'name' => 'Leasure'
            ]);
        $leasureCategory->save();

        $workCategory = factory(Category::class)->create([
            'id' => 2,
            'name' => 'Work'
            ]);
        $workCategory->save();

        $todoReservation = factory(Todo::class)->create([
            'id' => 1, 
            'title' => 'Make reservation at restaurant.', 
            'description' => 'Invite my parents, some friends from school and Caio.',
            'category_id' => $leasureCategory->id,
            'deadline' => '2017-01-01'
            ]);
        
        $todoReservation->save();

        $todoFixComputer = factory(Todo::class)->create([
            'id' => 2, 
            'title' => 'Fix my computer', 
            'description' => 'Upgrade to Windows 10 and install Office.',
            'category_id' => $workCategory->id,
            'deadline' => '2017-01-01'
            ]);
        
        $todoFixComputer->save();
    }
    public function tearDown(){
        parent::tearDown();
    }

    public function testShouldNotPersistEmptyTodo() {
        $response = $this->post('/add');

        $response->assertSessionHasErrors('title');
        $response->assertSessionHasErrors('description');
        $response->assertSessionHasErrors('category_id');
        $response->assertSessionHasErrors('deadline');
    }

    public function testViewingAllTodos() {
        $response = $this->get('/');
        $response->assertSeeText('Make reservation at restaurant.');
        $response->assertSeeText('Upgrade to Windows 10 and install Office.');
    }

    public function testEditATodoWithValues() {
        $newDescription = 'Upgrade to Windows 10, install Office and firefox.';

        $todoToBeEdited = Todo::find(2);
        $todoToBeEdited->description = $newDescription;
            
        $this->post('/update', $todoToBeEdited->toArray())->assertStatus(302);
        $this->get('/')->assertSeeText($newDescription);
    }

    public function testShouldNotEditATodoWithoutTitle() {
        $todoToBeEdited = Todo::find(1);
        $todoToBeEdited->title = null;
            
        $this->post('/update', $todoToBeEdited->toArray())->assertSessionHasErrors('title');
    }
}
