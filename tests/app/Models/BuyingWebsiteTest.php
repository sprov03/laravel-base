<?php

namespace Tests\Models;

use Tests\TestCase;
use Models\BuyingWebsite;

class BuyingWebsiteTest extends TestCase
{
    /**
     * @test
     */
    public function relationships()
    {
        $buyingWebsite = BuyingWebsite::first();
    }
}
