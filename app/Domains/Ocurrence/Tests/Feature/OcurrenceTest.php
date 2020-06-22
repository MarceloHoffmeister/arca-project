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
        $params = [
            'title' => 'Test title',
            'description' => 'Some description here',
            'value' => 100
        ];
        $response = $this->post('ocurrence/incidents', $params);

        $response->assertStatus(200);
    }

    public function testCreationRoute(): void
    {
        $params = [
            'title' => 'Test title',
            'description' => 'Some description here',
            'value' => 100
        ];
        $response = $this->post('ocurrence/incidents', $params);

        $response->assertStatus(200);
    }
}
