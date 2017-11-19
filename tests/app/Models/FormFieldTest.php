<?php

namespace Tests\Models;

use Tests\TestCase;
use Models\FormField;

class FormFieldTest extends TestCase
{
    /**
     * @test
     */
    public function relationships()
    {
        $formField = FormField::first();

        $this->assertInstanceOf(Form::class, $formField->form);
        $this->assertCollectionOf(Form::class, $formField->forms);
    }
}
