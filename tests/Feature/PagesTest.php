<?php

namespace Tests\Feature;

use App\Mail\ContactMessage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class PagesTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_page_is_accessible(): void
    {
        $this->get('/')->assertOk();
    }

    public function test_about_page(): void
    {
        $this->get('/profil')->assertOk();
    }

    public function test_skills_page(): void
    {
        $this->get('/competences')->assertOk();
    }

    public function test_services_page(): void
    {
        $this->get('/services')->assertOk();
    }

    public function test_projects_page(): void
    {
        $this->get('/projets')->assertOk();
    }

    public function test_timeline_page(): void
    {
        $this->get('/parcours')->assertOk();
    }

    public function test_contact_page(): void
    {
        $this->get('/contact')->assertOk();
    }

    public function test_blog_page(): void
    {
        $this->get('/blog')->assertOk();
    }

    public function test_404_page(): void
    {
        $this->get('/cette-page-n-existe-pas')->assertStatus(404);
    }

    public function test_security_headers_are_present(): void
    {
        $this->get('/')
            ->assertHeader('X-Content-Type-Options', 'nosniff')
            ->assertHeader('X-Frame-Options', 'SAMEORIGIN');
    }

    public function test_contact_form_queues_an_email(): void
    {
        Mail::fake();

        $this->post('/contact/send', [
            'name' => 'Jean',
            'email' => 'jean@example.com',
            'proposal' => 'Site vitrine',
            'message' => 'Bonjour, parlons de mon projet.',
        ])->assertRedirect()->assertSessionHas('success');

        $this->assertDatabaseHas('contacts', ['email' => 'jean@example.com']);
        Mail::assertQueued(ContactMessage::class);
    }

    public function test_contact_honeypot_is_silently_ignored(): void
    {
        Mail::fake();

        $this->post('/contact/send', [
            'name' => 'Bot',
            'email' => 'bot@example.com',
            'proposal' => 'Spam',
            'message' => 'Spam',
            'website' => 'https://spam.example',
        ])->assertRedirect()->assertSessionHas('success');

        $this->assertDatabaseCount('contacts', 0);
        Mail::assertNothingQueued();
    }

    public function test_sitemap_returns_xml(): void
    {
        $this->get('/sitemap.xml')->assertOk()->assertHeader('Content-Type', 'application/xml');
    }

    public function test_rss_feed_returns_xml(): void
    {
        $this->get('/feed')->assertOk()->assertHeader('Content-Type', 'application/rss+xml');
    }
}
