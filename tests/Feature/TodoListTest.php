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

        // Decode the JSON response into an array
        $responseData = $response->json();
        // Assert that the JSON response contains 3 items
        $this->assertCount(3, $responseData['products']);
    }
}
