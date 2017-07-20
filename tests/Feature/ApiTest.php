<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ApiTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRestApiMethod()
    {
        $response = $this->json('GET', '/api/testRoute');

        $response
	        ->assertStatus(200)
	        ->assertJson([
		        'field1' => 'value1',
		        'field2' => 'value2'
	        ]);
    }
}
