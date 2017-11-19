<?php

namespace Tests\Models;

use Tests\TestCase;
use Models\FormFieldType;

class FormFieldTypeTest extends TestCase
{
    /**
     * @test
     */
    public function relationships()
    {
        $formFieldType = FormFieldType::first();
    }
}
