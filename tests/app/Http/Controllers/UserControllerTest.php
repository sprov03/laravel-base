<?php

namespace Tests\App\Http\Controllers;

use Tests\TestCase;
use Models\User;

class UserControllerTest extends TestCase
{
    /**
     * @test
     */
    public function index()
    {
        $this->get("/users");

        $this->assertResponseOk();

        $this->seeJsonStructure([
            'total',
            'per_page',
            'current_page',
            'data' => [
                [
                    'id',
                    'name',
                    'email',
                    'password',
                    'remember_token',
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
        $user = User::first();

        $this->get("/users/{$user->id}");

        $this->assertResponseOk();
        $this->seeJsonStructure([
            'id',
            'name',
            'email',
            'password',
            'remember_token',
            'created_at',
            'updated_at',
        ]);
    }

    /**
     * @test
     */
    public function store()
    {
        $request = [
            // 'id' => 99999,
            // 'name' => 99999,
            // 'email' => 99999,
            // 'password' => 99999,
            // 'remember_token' => 99999,
            // 'created_at' => 99999,
            // 'updated_at' => 99999,
        ];

        $this->post("/users", $request);
        $this->assertResponseOk();

        $this->seeJsonStructure([
            'id',
            'name',
            'email',
            'password',
            'remember_token',
            'created_at',
            'updated_at',
        ]);
        $this->seeInDatabase('users', [
            // 'id' => 99999,
            // 'name' => 99999,
            // 'email' => 99999,
            // 'password' => 99999,
            // 'remember_token' => 99999,
            // 'created_at' => 99999,
            // 'updated_at' => 99999,
        ]);
    }

    /**
     * @test
     */
    public function update()
    {
        $user = User::first();

        $request = [
            // 'id' => 99999,
            // 'name' => 99999,
            // 'email' => 99999,
            // 'password' => 99999,
            // 'remember_token' => 99999,
            // 'created_at' => 99999,
            // 'updated_at' => 99999,
        ];

        $this->put("/users/{$user->id}", $request);
        $this->assertResponseOk();

        $this->seeJsonStructure([
            'id',
            'name',
            'email',
            'password',
            'remember_token',
            'created_at',
            'updated_at',
        ]);
        $this->seeInDatabase('users', [
            // 'id' => 99999,
            // 'name' => 99999,
            // 'email' => 99999,
            // 'password' => 99999,
            // 'remember_token' => 99999,
            // 'created_at' => 99999,
            // 'updated_at' => 99999,
        ]);
    }

    /**
     * @test
     */
    public function destroy()
    {
        $user = User::first();

        $this->delete("/users/{$user->id}");
        $this->assertResponseOk();

        $this->assertInstanceSoftDeleted($user);
        $this->seeJsonStructure([
            'id',
            'name',
            'email',
            'password',
            'remember_token',
            'created_at',
            'updated_at',
        ]);
    }

}
