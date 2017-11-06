<?php

namespace Tests\Models;

use Models\User;

class UserTest extends \TestCase
{
    /**
     * @test
     */
    public function relationships()
    {
        $user = User::first();
    }
}
