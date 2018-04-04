<?php

namespace Tests\Users\Cows;

use Tests\TestCase;
use Users\Cows\Cow;

class CowTest extends TestCase
{
    /**
     * @test
     */
    public function relationships()
    {
        $cow = Cow::first();

        $this->assertInstanceOf(User::class, $cow->user);
        $this->assertCollectionOf(User::class, $cow->users);
    }
}
