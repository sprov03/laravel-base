<?php

namespace Tests\Models;

use Tests\TestCase;
use Models\Form;

class FormTest extends TestCase
{
    /**
     * @test
     */
    public function relationships()
    {
        $form = Form::first();

        $this->assertInstanceOf(User::class, $form->user);
        $this->assertCollectionOf(User::class, $form->users);
    }
}
