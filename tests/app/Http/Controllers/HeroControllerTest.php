<?php

namespace Tests\App\Http\Controllers;

use Tests\TestCase;
use Models\Hero;

class HeroControllerTest extends TestCase
{
    /**
     * @test
     */
    public function index()
    {
        $this->get("/heroes");

        $this->assertResponseOk();

        $this->seeJsonStructure([
            'total',
            'per_page',
            'current_page',
            'data' => [
                [
                    'id',
                    'name',
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
        $hero = Hero::first();

        $this->get("/heroes/{$hero->id}");

        $this->assertResponseOk();
        $this->seeJsonStructure([
            'id',
            'name',
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
            // 'created_at' => 99999,
            // 'updated_at' => 99999,
        ];

        $this->post("/heroes", $request);
        $this->assertResponseOk();

        $this->seeJsonStructure([
            'id',
            'name',
            'created_at',
            'updated_at',
        ]);
        $this->seeInDatabase('heroes', [
            // 'id' => 99999,
            // 'name' => 99999,
            // 'created_at' => 99999,
            // 'updated_at' => 99999,
        ]);
    }

    /**
     * @test
     */
    public function update()
    {
        $hero = Hero::first();

        $request = [
            // 'id' => 99999,
            // 'name' => 99999,
            // 'created_at' => 99999,
            // 'updated_at' => 99999,
        ];

        $this->put("/heroes/{$hero->id}", $request);
        $this->assertResponseOk();

        $this->seeJsonStructure([
            'id',
            'name',
            'created_at',
            'updated_at',
        ]);
        $this->seeInDatabase('heroes', [
            // 'id' => 99999,
            // 'name' => 99999,
            // 'created_at' => 99999,
            // 'updated_at' => 99999,
        ]);
    }

    /**
     * @test
     */
    public function destroy()
    {
        $hero = Hero::first();

        $this->delete("/heroes/{$hero->id}");
        $this->assertResponseOk();

        $this->assertInstanceSoftDeleted($hero);
        $this->seeJsonStructure([
            'id',
            'name',
            'created_at',
            'updated_at',
        ]);
    }

}
