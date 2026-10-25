<?php

namespace Tests\Feature;

use App\Models\PageView;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PrunePageViewsTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_prunes_old_page_views(): void
    {
        PageView::create(['url' => '/ancienne'])->forceFill([
            'created_at' => now()->subDays(120),
            'updated_at' => now()->subDays(120),
        ])->save();

        PageView::create(['url' => '/recente']);

        $this->artisan('page-views:prune')->assertSuccessful();

        $this->assertDatabaseMissing('page_views', ['url' => '/ancienne']);
        $this->assertDatabaseHas('page_views', ['url' => '/recente']);
    }
}
