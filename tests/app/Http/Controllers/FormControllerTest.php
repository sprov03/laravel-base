<?php

namespace Tests\App\Http\Controllers;

use Tests\TestCase;
use Models\Form;

class FormControllerTest extends TestCase
{
    /**
     * @test
     */
    public function index()
    {
        $this->get("/forms");

        $this->assertResponseOk();

        $this->seeJsonStructure([
            'total',
            'per_page',
            'current_page',
            'data' => [
                [
                    'id',
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
        $form = Form::first();

        $this->get("/forms/{$form->id}");

        $this->assertResponseOk();
        $this->seeJsonStructure([
            'id',
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
            // 'user_id' => 99999,
        ];

        $this->post("/forms", $request);
        $this->assertResponseOk();

        $this->seeJsonStructure([
            'id',
            'user_id',
        ]);
        $this->seeInDatabase('forms', [
            // 'id' => 99999,
            // 'user_id' => 99999,
        ]);
    }

    /**
     * @test
     */
    public function update()
    {
        $form = Form::first();

        $request = [
            // 'id' => 99999,
            // 'user_id' => 99999,
        ];

        $this->put("/forms/{$form->id}", $request);
        $this->assertResponseOk();

        $this->seeJsonStructure([
            'id',
            'user_id',
        ]);
        $this->seeInDatabase('forms', [
            // 'id' => 99999,
            // 'user_id' => 99999,
        ]);
    }

    /**
     * @test
     */
    public function destroy()
    {
        $form = Form::first();

        $this->delete("/forms/{$form->id}");
        $this->assertResponseOk();

        $this->assertInstanceSoftDeleted($form);
        $this->seeJsonStructure([
            'id',
            'user_id',
        ]);
    }

}
