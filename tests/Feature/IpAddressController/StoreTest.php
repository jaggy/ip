<?php

declare(strict_types=1);

namespace Tests\Feature\IpAddressController;

use Tests\TestCase;

class StoreTest extends TestCase
{
    public function testBasic()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
