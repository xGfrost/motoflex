<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function test_root_redirects_to_login(): void
{
    $response = $this->get('/');

    // Cek apakah benar-benar redirect ke route 'login'
    $response->assertRedirect(route('login'));
}
}
