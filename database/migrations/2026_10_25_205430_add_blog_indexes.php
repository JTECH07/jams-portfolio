<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->index('published', 'posts_published_index');
            $table->index('category', 'posts_category_index');
        });

        Schema::table('comments', function (Blueprint $table) {
            $table->index('approved', 'comments_approved_index');
        });

        Schema::table('subscribers', function (Blueprint $table) {
            $table->index('active', 'subscribers_active_index');
        });

        Schema::table('page_views', function (Blueprint $table) {
            $table->index('url', 'page_views_url_index');
            $table->index('created_at', 'page_views_created_at_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropIndex('posts_published_index');
            $table->dropIndex('posts_category_index');
        });

        Schema::table('comments', function (Blueprint $table) {
            $table->dropIndex('comments_approved_index');
        });

        Schema::table('subscribers', function (Blueprint $table) {
            $table->dropIndex('subscribers_active_index');
        });

        Schema::table('page_views', function (Blueprint $table) {
            $table->dropIndex('page_views_url_index');
            $table->dropIndex('page_views_created_at_index');
        });
    }
};
