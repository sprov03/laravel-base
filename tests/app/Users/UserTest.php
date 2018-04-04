<?php

namespace Tests\Users;

use Tests\TestCase;
use Users\User;

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
