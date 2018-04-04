<?php

namespace Tests\App\Http\Controllers;

use Tests\TestCase;
use Models\Users\Cows\Cow;

class CowControllerTest extends TestCase
{
    /**
     * @test
     */
    public function index()
    {
        $this->get("/cows");

        $this->assertResponseOk();

        $this->seeJsonStructure([
            'total',
            'per_page',
            'current_page',
            'data' => [
                [
                    'id',
                    'name',
                    'deleted_at',
                    'created_at',
                    'updated_at',
                    'user_id',
                ]
            ]
        ]);
    }

    /**
     * @test
     */
    public function show()
    {
        $cow = Cow::first();

        $this->get("/cows/{$cow->id}");

        $this->assertResponseOk();
        $this->seeJsonStructure([
            'id',
            'name',
            'deleted_at',
            'created_at',
            'updated_at',
            'user_id',
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
            // 'deleted_at' => 99999,
            // 'created_at' => 99999,
            // 'updated_at' => 99999,
            // 'user_id' => 99999,
        ];

        $this->post("/cows", $request);
        $this->assertResponseOk();

        $this->seeJsonStructure([
            'id',
            'name',
            'deleted_at',
            'created_at',
            'updated_at',
            'user_id',
        ]);
        $this->seeInDatabase('cows', [
            // 'id' => 99999,
            // 'name' => 99999,
            // 'deleted_at' => 99999,
            // 'created_at' => 99999,
            // 'updated_at' => 99999,
            // 'user_id' => 99999,
        ]);
    }

    /**
     * @test
     */
    public function update()
    {
        $cow = Cow::first();

        $request = [
            // 'id' => 99999,
            // 'name' => 99999,
            // 'deleted_at' => 99999,
            // 'created_at' => 99999,
            // 'updated_at' => 99999,
            // 'user_id' => 99999,
        ];

        $this->put("/cows/{$cow->id}", $request);
        $this->assertResponseOk();

        $this->seeJsonStructure([
            'id',
            'name',
            'deleted_at',
            'created_at',
            'updated_at',
            'user_id',
        ]);
        $this->seeInDatabase('cows', [
            // 'id' => 99999,
            // 'name' => 99999,
            // 'deleted_at' => 99999,
            // 'created_at' => 99999,
            // 'updated_at' => 99999,
            // 'user_id' => 99999,
        ]);
    }

    /**
     * @test
     */
    public function destroy()
    {
        $cow = Cow::first();

        $this->delete("/cows/{$cow->id}");
        $this->assertResponseOk();

        $this->assertInstanceSoftDeleted($cow);
        $this->seeJsonStructure([
            'id',
            'name',
            'deleted_at',
            'created_at',
            'updated_at',
            'user_id',
        ]);
    }

}
