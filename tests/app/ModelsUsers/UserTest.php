<?php

namespace Tests\ModelsUsers;

use Tests\TestCase;
use ModelsUsers\User;

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
