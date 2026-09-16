<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminTest extends TestCase
{
    use RefreshDatabase;

    private function actingAsAdmin(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);
    }

    public function test_admin_requires_auth(): void
    {
        $this->get('/admin')->assertRedirect('/login');
    }

    public function test_admin_dashboard(): void
    {
        $this->actingAsAdmin();
        $this->get('/admin')->assertOk()->assertSee('Tableau de bord');
    }

    public function test_admin_posts_page(): void
    {
        $this->actingAsAdmin();
        $this->get('/admin/posts')->assertOk()->assertSee('Articles');
    }

    public function test_admin_create_post_form(): void
    {
        $this->actingAsAdmin();
        $this->get('/admin/posts/create')->assertOk()->assertSee('Nouvel article');
    }

    public function test_login_page(): void
    {
        $this->get('/login')->assertOk()->assertSee('Connexion');
    }
}
