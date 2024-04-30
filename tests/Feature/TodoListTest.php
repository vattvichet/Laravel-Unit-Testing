<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodoListTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_getTodoList(): void
    {
        $response = $this->get('api/todo-list');
        $response->assertStatus(200);
        // Make sure that the response match with mocked structure
        $response->assertJsonStructure([
            "todos" => [
                '*' => [
                    "id",
                    "todo",
                    "completed",
                ]
            ]
        ]);
        // Decode the JSON response into an array
        $responseData = $response->json();
        $this->assertEquals(150, $responseData['total']);
    }

    public function test_postTodo()
    {
        $mock_body = [
            'userId' => 1,
            'completed' => false,
            "todo" => "Go back home"
        ];
        $response = $this->post('api/todo-list', $mock_body);
        $response->assertStatus(200);
        $response->assertJsonStructure([
            "id",
            "todo",
            "completed",
            "userId",
        ]);

        // Test case 3: Testing with incorrect data type
        $incorrectData = [
            'userId' => 'not an integer', // userId should be an integer
            'completed' => false,
            'todo' => 'Do something'
        ];
        $response = $this->postJson('/api/todo-list', $incorrectData);
        $response->assertStatus(400);
    }
}
