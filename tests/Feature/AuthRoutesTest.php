<?php

namespace Tests\Feature;

use Tests\TestCase;

class AuthRoutesTest extends TestCase
{
    public function test_login_and_register_routes_exist(): void
    {
        $this->get('/login')->assertStatus(200);
        $this->get('/register')->assertStatus(200);
    }
}
