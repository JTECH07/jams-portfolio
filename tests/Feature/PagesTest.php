<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

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

    public function test_sitemap_returns_xml(): void
    {
        $this->get('/sitemap.xml')->assertOk()->assertHeader('Content-Type', 'application/xml');
    }

    public function test_rss_feed_returns_xml(): void
    {
        $this->get('/feed')->assertOk()->assertHeader('Content-Type', 'application/rss+xml');
    }
}
