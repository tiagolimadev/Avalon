<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserTest extends TestCase
{
    use DatabaseMigrations;

    protected $user;
    protected $role;

    public function setUp()
    {
        parent::setUp();

        $this->role = \factory('App\Role')->create();
        $this->user = \factory('App\User')->create();
    }

    /** @test */
    public function posso_cadastrar_usuario_professor()
    {
        $this->assertNotNull($this->role);
        $this->assertNotNull($this->user);

        $this->user->attachRole($this->role);
        $this->assertTrue($this->user->hasRole($this->role->name));

        $this->assertInstanceOf('App\User', $this->user);
    }
}
