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
        $response = $this->getJson('api/todo-list');
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
}
