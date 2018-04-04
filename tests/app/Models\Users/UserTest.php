<?php

namespace Tests\Models\Users;

use Tests\TestCase;
use Models\Users\User;

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
