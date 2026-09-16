<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\Subscriber;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SubscriberTest extends TestCase
{
    use RefreshDatabase;

    public function test_subscriber_create(): void
    {
        $sub = Subscriber::factory()->create(['email' => 'test@example.com']);
        $this->assertEquals('test@example.com', $sub->email);
        $this->assertTrue($sub->active);
    }
}
