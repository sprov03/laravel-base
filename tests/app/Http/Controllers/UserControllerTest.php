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
            'name' => 'Shawn Pivonka',
            'email' => 'testemail@gmail.com',
            'password' => 'test_password'
        ];

        $this->post("/users", $request);
        $this->assertResponseOk();

        $this->seeJsonStructure([
            'id',
            'name',
            'email',
            'password',
            'created_at',
            'updated_at',
        ]);
        $this->seeInDatabase('users', [
            'name' => 'Shawn Pivonka',
            'email' => 'testemail@gmail.com',
            'password' => 'test_password'
        ]);
    }

    /**
     * @test
     */
    public function update()
    {
        $user = User::first();

        $request = [
            'name' => 'Shawn Pivonka',
            'email' => 'testemail@gmail.com',
            'password' => 'test_password'
        ];

        $this->put("/users/{$user->id}", $request);
        $this->assertResponseOk();

        $this->seeJsonStructure([
            'id',
            'name',
            'email',
            'password',
            'created_at',
            'updated_at',
        ]);
        $this->seeInDatabase('users', [
            'name' => 'Shawn Pivonka',
            'email' => 'testemail@gmail.com',
            'password' => 'test_password'
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
            'created_at',
            'updated_at',
        ]);
    }

}
