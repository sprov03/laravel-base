<?php

namespace Tests\App\Http\Controllers;

use Tests\TestCase;
use Models\FormField;

class FormFieldControllerTest extends TestCase
{
    /**
     * @test
     */
    public function index()
    {
        $this->get("/form_fields");

        $this->assertResponseOk();

        $this->seeJsonStructure([
            'total',
            'per_page',
            'current_page',
            'data' => [
                [
                    'id',
                    'form_id',
                    'form_field_type',
                ]
            ]
        ]);
    }

    /**
     * @test
     */
    public function show()
    {
        $form_field = FormField::first();

        $this->get("/form_fields/{$form_field->id}");

        $this->assertResponseOk();
        $this->seeJsonStructure([
            'id',
            'form_id',
            'form_field_type',
        ]);
    }

    /**
     * @test
     */
    public function store()
    {
        $request = [
            // 'id' => 99999,
            // 'form_id' => 99999,
            // 'form_field_type' => 99999,
        ];

        $this->post("/form_fields", $request);
        $this->assertResponseOk();

        $this->seeJsonStructure([
            'id',
            'form_id',
            'form_field_type',
        ]);
        $this->seeInDatabase('form_fields', [
            // 'id' => 99999,
            // 'form_id' => 99999,
            // 'form_field_type' => 99999,
        ]);
    }

    /**
     * @test
     */
    public function update()
    {
        $form_field = FormField::first();

        $request = [
            // 'id' => 99999,
            // 'form_id' => 99999,
            // 'form_field_type' => 99999,
        ];

        $this->put("/form_fields/{$form_field->id}", $request);
        $this->assertResponseOk();

        $this->seeJsonStructure([
            'id',
            'form_id',
            'form_field_type',
        ]);
        $this->seeInDatabase('form_fields', [
            // 'id' => 99999,
            // 'form_id' => 99999,
            // 'form_field_type' => 99999,
        ]);
    }

    /**
     * @test
     */
    public function destroy()
    {
        $form_field = FormField::first();

        $this->delete("/form_fields/{$form_field->id}");
        $this->assertResponseOk();

        $this->assertInstanceSoftDeleted($form_field);
        $this->seeJsonStructure([
            'id',
            'form_id',
            'form_field_type',
        ]);
    }

}
