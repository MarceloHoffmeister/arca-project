<?php

namespace Arca\Support\Tests\Feature;

use Arca\Support\Tests\TestCase;

class OcurrenceTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testStatusCreationRoute(): void
    {
        $response = $this->post('ocurrence/incidents');

        $response->assertStatus(200);
    }
}
