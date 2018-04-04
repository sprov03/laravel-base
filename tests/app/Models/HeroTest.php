<?php

namespace Tests\Models;

use Tests\TestCase;
use Models\Hero;

class HeroTest extends TestCase
{
    /**
     * @test
     */
    public function relationships()
    {
        $hero = Hero::first();
    }
}
