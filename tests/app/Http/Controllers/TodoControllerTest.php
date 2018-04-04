<?php

namespace Tests\App\Http\Controllers;

use App\User;
use Tests\TestCase;
use Models\Todos\Todo;

class TodoControllerTest extends TestCase
{
    /**
     * @test
     */
    public function index()
    {
        $this->get("/api/todos");

        $this->assertResponseOk();

        $this->seeJsonStructure([
            'total',
            'per_page',
            'current_page',
            'data' => [
                [
                    'id',
                    'label',
                    'notes',
                    'deleted_at',
                    'created_at',
                    'updated_at',
                ]
            ]
        ]);
    }

    /**
     * @test
     */
    public function show()
    {
        $todo = Todo::first();

        $this->get("/api/todos/{$todo->id}");

        $this->assertResponseOk();
        $this->seeJsonStructure([
            'id',
            'label',
            'notes',
            'deleted_at',
            'created_at',
            'updated_at',
        ]);
    }

    /**
     * @test
     */
    public function store()
    {
        $this->actingAs(User::first());

        $request = [
            // 'id' => 99999,
             'label' => 'first label',
             'notes' => 'a tetsing descriptions',
            // 'deleted_at' => 99999,
            // 'created_at' => 99999,
            // 'updated_at' => 99999,
        ];

        $this->post("/api/todos", $request);
        $this->assertResponseOk();

        $this->seeJsonStructure([
            'id',
            'label',
            'notes',
            'created_at',
            'updated_at',
        ]);
        $this->seeInDatabase('todos', [
            // 'id' => 99999,
             'label' => 'first label',
             'notes' => 'a tetsing descriptions',
            // 'deleted_at' => 99999,
            // 'created_at' => 99999,
            // 'updated_at' => 99999,
        ]);
    }

    /**
     * @test
     */
    public function update()
    {
        $todo = Todo::first();

        $request = [
            // 'id' => 99999,
            'label' => 'first label',
            'notes' => 'a tetsing descriptions',
            // 'deleted_at' => 99999,
            // 'created_at' => 99999,
            // 'updated_at' => 99999,
        ];

        $this->put("/api/todos/{$todo->id}", $request);
        $this->assertResponseOk();

        $this->seeJsonStructure([
            'id',
            'label',
            'notes',
            'deleted_at',
            'created_at',
            'updated_at',
        ]);
        $this->seeInDatabase('todos', [
            // 'id' => 99999,
            'label' => 'first label',
            'notes' => 'a tetsing descriptions',
            // 'deleted_at' => 99999,
            // 'created_at' => 99999,
            // 'updated_at' => 99999,
        ]);
    }

    /**
     * @test
     */
    public function destroy()
    {
        $todo = Todo::first();

        $this->delete("/api/todos/{$todo->id}");
        $this->assertResponseOk();

        $this->assertInstanceSoftDeleted($todo);
        $this->seeJsonStructure([
            'id',
            'label',
            'notes',
            'deleted_at',
            'created_at',
            'updated_at',
        ]);
    }

}
