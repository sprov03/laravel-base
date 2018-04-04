<?php

namespace Tests\Todos;

use Tests\TestCase;
use Models\Todos\Todo;

class TodoTest extends TestCase
{
    /**
     * @test
     */
    public function relationships()
    {
        $todo = Todo::first();

        $this->assertInstanceOf(User::class, $todo->user);
        $this->assertCollectionOf(User::class, $todo->users);
    }
}
