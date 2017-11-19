<?php

namespace Tests\Models;

use Tests\TestCase;
use Models\Site;

class SiteTest extends TestCase
{
    /**
     * @test
     */
    public function relationships()
    {
        $site = Site::first();

        $this->assertInstanceOf(User::class, $site->user);
        $this->assertCollectionOf(User::class, $site->users);

        $this->assertInstanceOf(Website::class, $site->website);
        $this->assertCollectionOf(Website::class, $site->websites);
    }
}
