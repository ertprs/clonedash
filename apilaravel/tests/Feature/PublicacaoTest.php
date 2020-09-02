<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PublicacaoTest extends TestCase
{
    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function verify_deploy_sucess()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
