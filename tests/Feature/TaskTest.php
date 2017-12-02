<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaskTest extends TestCase
{
    public function testRequiresTitleAndStartAndEnd()
    {
        $this->json('POST', 'api/tasks')
            ->assertStatus(400)
            ->assertJson([
                'error' => 1,
                'message' => [
                    'The title field is required.',
                    'The start field is required.',
                    'The end field is required.'
                ]
            ]);
    }

    public function testsTasksAreCreatedCorrectly()
    {
        $payload = [
            'title' => 'Lorem',
            'description' => 'Lorem Ipsum',
            'start' => '2017-12-02',
            'end' => '2017-12-03',
            'done' => 0
        ];

        $this->json('POST', '/api/tasks', $payload)
            ->assertStatus(201)
            ->assertJson([
                'error' => 0
            ]);
    }

    public function testsTasksAreUpdatedCorrectly()
    {
        $task = factory(\App\Task::class)->create();

        $payload = [
            'id' => $task->id,
            'title' => $task->title,
            'description' => 'Ipsum',
            'start' => $task->start,
            'end' => $task->end,
            'done' => $task->done,
            'tags' => $task->tags
        ];

        $this->json('PUT', '/api/tasks/' . $task->id, $payload)
            ->assertStatus(200)
            ->assertJson([
                'error' => 0
            ]);
    }

    public function testsTasksAreDeletedCorrectly()
    {
        $task = factory(\App\Task::class)->create();

        $this->json('DELETE', '/api/tasks/' . $task->id)
            ->assertStatus(204);
    }

    public function testTaskAreListedCorrectly()
    {
        factory(\App\Task::class)->create([
            'title' => 'Lorem 1',
            'description' => 'Lorem Ipsum',
            'start' => '2017-12-02',
            'end' => '2017-12-03',
            'done' => 0
        ]);

        factory(\App\Task::class)->create([
            'title' => 'Lorem 2',
            'description' => 'Lorem Ipsum',
            'start' => '2017-12-02',
            'end' => '2017-12-03',
            'done' => 1
        ]);

        $this->json('GET', '/api/tasks')
            ->assertStatus(200)
            ->assertJson([
                [
                    'id' => 1,
                    'title' => 'Lorem 1',
                    'description' => 'Lorem Ipsum',
                    'start' => '2017-12-02',
                    'end' => '2017-12-03',
                    'done' => 0
                ],
                [
                    'id' => 2,
                    'title' => 'Lorem 2',
                    'description' => 'Lorem Ipsum',
                    'start' => '2017-12-02',
                    'end' => '2017-12-03',
                    'done' => 1
                ]
            ])
            ->assertJsonStructure([
                '*' => ['id', 'title', 'description', 'start', 'end', 'done', 'created_at', 'updated_at']
            ]);
    }

    public function testRequestNotFound()
    {
        $this->json('GET', '/api/task')
            ->assertStatus(404)
            ->assertJson([
                'error' => 1,
                'message' => ['Resource not found']
            ]);
    }
}
