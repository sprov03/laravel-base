<?php

namespace Tests\Models\Users\Cows;

use Tests\TestCase;
use Models\Users\Cows\Cow;

class CowTest extends TestCase
{
    /**
     * @test
     */
    public function relationships()
    {
        $cow = Cow::first();

        $this->assertInstanceOf(User::class, $cow->user);
    }
}
