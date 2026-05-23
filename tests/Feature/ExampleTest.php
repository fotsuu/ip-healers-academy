<?php

namespace Tests\Feature;

<<<<<<< HEAD
// use Illuminate\Foundation\Testing\RefreshDatabase;
=======
use Illuminate\Foundation\Testing\RefreshDatabase;
>>>>>>> 09a839a71869700271315891a8646214b20f9eb1
use Tests\TestCase;

class ExampleTest extends TestCase
{
<<<<<<< HEAD
=======
    use RefreshDatabase;

>>>>>>> 09a839a71869700271315891a8646214b20f9eb1
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
