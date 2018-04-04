<?php

namespace Tests;

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Pivonka\ModelAssertions\ModelAssertionTrait;

class TestCase extends \Illuminate\Foundation\Testing\TestCase
{
    use DatabaseTransactions;
    use ModelAssertionTrait;

    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    public $baseUrl = 'http://base_52.dev';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        return $app;
    }

    /**
     * @test
     */
    public function user()
    {
        $this->markTestSkipped();
        $this->get('/');

        $this->assertResponseOk();
    }
}
