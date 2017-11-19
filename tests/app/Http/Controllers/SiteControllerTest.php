<?php

namespace Tests\App\Http\Controllers;

use Tests\TestCase;
use Models\Site;

class SiteControllerTest extends TestCase
{
    /**
     * @test
     */
    public function index()
    {
        $this->get("/sites");

        $this->assertResponseOk();

        $this->seeJsonStructure([
            'total',
            'per_page',
            'current_page',
            'data' => [
                [
                    'id',
                    'user_id',
                    'website_id',
                    'website_type',
                ]
            ]
        ]);
    }

    /**
     * @test
     */
    public function show()
    {
        $site = Site::first();

        $this->get("/sites/{$site->id}");

        $this->assertResponseOk();
        $this->seeJsonStructure([
            'id',
            'user_id',
            'website_id',
            'website_type',
        ]);
    }

    /**
     * @test
     */
    public function store()
    {
        $request = [
            // 'id' => 99999,
            // 'user_id' => 99999,
            // 'website_id' => 99999,
            // 'website_type' => 99999,
        ];

        $this->post("/sites", $request);
        $this->assertResponseOk();

        $this->seeJsonStructure([
            'id',
            'user_id',
            'website_id',
            'website_type',
        ]);
        $this->seeInDatabase('sites', [
            // 'id' => 99999,
            // 'user_id' => 99999,
            // 'website_id' => 99999,
            // 'website_type' => 99999,
        ]);
    }

    /**
     * @test
     */
    public function update()
    {
        $site = Site::first();

        $request = [
            // 'id' => 99999,
            // 'user_id' => 99999,
            // 'website_id' => 99999,
            // 'website_type' => 99999,
        ];

        $this->put("/sites/{$site->id}", $request);
        $this->assertResponseOk();

        $this->seeJsonStructure([
            'id',
            'user_id',
            'website_id',
            'website_type',
        ]);
        $this->seeInDatabase('sites', [
            // 'id' => 99999,
            // 'user_id' => 99999,
            // 'website_id' => 99999,
            // 'website_type' => 99999,
        ]);
    }

    /**
     * @test
     */
    public function destroy()
    {
        $site = Site::first();

        $this->delete("/sites/{$site->id}");
        $this->assertResponseOk();

        $this->assertInstanceSoftDeleted($site);
        $this->seeJsonStructure([
            'id',
            'user_id',
            'website_id',
            'website_type',
        ]);
    }

}
