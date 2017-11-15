<?php

namespace Tests\Models;

use Tests\TestCase;
use Models\User;

class UserTest extends TestCase
{
    /**
     * @test
     */
    public function relationships()
    {
        $user = User::first();
    }
}
