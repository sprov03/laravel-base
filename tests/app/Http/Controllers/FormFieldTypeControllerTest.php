<?php

namespace Tests\App\Http\Controllers;

use Tests\TestCase;
use Models\FormFieldType;

class FormFieldTypeControllerTest extends TestCase
{
    /**
     * @test
     */
    public function index()
    {
        $this->get("/form_field_types");

        $this->assertResponseOk();

        $this->seeJsonStructure([
            'total',
            'per_page',
            'current_page',
            'data' => [
                [
                    'name',
                ]
            ]
        ]);
    }

    /**
     * @test
     */
    public function show()
    {
        $form_field_type = FormFieldType::first();

        $this->get("/form_field_types/{$form_field_type->id}");

        $this->assertResponseOk();
        $this->seeJsonStructure([
            'name',
        ]);
    }

    /**
     * @test
     */
    public function store()
    {
        $request = [
            // 'name' => 99999,
        ];

        $this->post("/form_field_types", $request);
        $this->assertResponseOk();

        $this->seeJsonStructure([
            'name',
        ]);
        $this->seeInDatabase('form_field_types', [
            // 'name' => 99999,
        ]);
    }

    /**
     * @test
     */
    public function update()
    {
        $form_field_type = FormFieldType::first();

        $request = [
            // 'name' => 99999,
        ];

        $this->put("/form_field_types/{$form_field_type->id}", $request);
        $this->assertResponseOk();

        $this->seeJsonStructure([
            'name',
        ]);
        $this->seeInDatabase('form_field_types', [
            // 'name' => 99999,
        ]);
    }

    /**
     * @test
     */
    public function destroy()
    {
        $form_field_type = FormFieldType::first();

        $this->delete("/form_field_types/{$form_field_type->id}");
        $this->assertResponseOk();

        $this->assertInstanceSoftDeleted($form_field_type);
        $this->seeJsonStructure([
            'name',
        ]);
    }

}
