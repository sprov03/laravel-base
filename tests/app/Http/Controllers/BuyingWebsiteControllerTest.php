<?php

namespace Tests\App\Http\Controllers;

use Tests\TestCase;
use Models\BuyingWebsite;

class BuyingWebsiteControllerTest extends TestCase
{
    /**
     * @test
     */
    public function index()
    {
        $this->get("/buying_websites");

        $this->assertResponseOk();

        $this->seeJsonStructure([
            'total',
            'per_page',
            'current_page',
            'data' => [
                [
                    'id',
                ]
            ]
        ]);
    }

    /**
     * @test
     */
    public function show()
    {
        $buying_website = BuyingWebsite::first();

        $this->get("/buying_websites/{$buying_website->id}");

        $this->assertResponseOk();
        $this->seeJsonStructure([
            'id',
        ]);
    }

    /**
     * @test
     */
    public function store()
    {
        $request = [
            // 'id' => 99999,
        ];

        $this->post("/buying_websites", $request);
        $this->assertResponseOk();

        $this->seeJsonStructure([
            'id',
        ]);
        $this->seeInDatabase('buying_websites', [
            // 'id' => 99999,
        ]);
    }

    /**
     * @test
     */
    public function update()
    {
        $buying_website = BuyingWebsite::first();

        $request = [
            // 'id' => 99999,
        ];

        $this->put("/buying_websites/{$buying_website->id}", $request);
        $this->assertResponseOk();

        $this->seeJsonStructure([
            'id',
        ]);
        $this->seeInDatabase('buying_websites', [
            // 'id' => 99999,
        ]);
    }

    /**
     * @test
     */
    public function destroy()
    {
        $buying_website = BuyingWebsite::first();

        $this->delete("/buying_websites/{$buying_website->id}");
        $this->assertResponseOk();

        $this->assertInstanceSoftDeleted($buying_website);
        $this->seeJsonStructure([
            'id',
        ]);
    }

}
