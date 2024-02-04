<?php

namespace Tests\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class TaskControllerTest extends TestCase
{
    use RefreshDatabase;

    const API_TASKS = '/api/tasks';
    protected $seed = true;

    public function testIndex()
    {
        $response = $this->getJson(self::API_TASKS);

        $response
            ->assertStatus(200)
            ->assertJson(fn(AssertableJson $json) => $json->hasAll(['data', 'meta', 'links'])->missing('message'));
    }

    public function testShow()
    {
        $response = $this->getJson(self::API_TASKS . '/1');

        $response
            ->assertStatus(200)
            ->assertJson(fn(AssertableJson $json) => $json->has('data')->missing('message'));
    }

    public function testDestroy()
    {
        $response = $this->deleteJson(self::API_TASKS . '/2');

        $response->assertStatus(200);
    }

    public function testUpdate()
    {
        $response = $this->putJson(self::API_TASKS . '/1', ['title' => 'title', 'description' => 'description']);

        $response->assertStatus(200);
    }

    public function testStore()
    {
        $response = $this->postJson(self::API_TASKS, ['title' => 'title', 'description' => 'description']);

        $response->assertStatus(201);
    }

}
