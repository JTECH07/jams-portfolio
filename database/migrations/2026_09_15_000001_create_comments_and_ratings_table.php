<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('author_name');
            $table->string('author_email')->nullable();
            $table->text('body');
            $table->nullableMorphs('commentable'); // post ou service
            $table->boolean('approved')->default(true);
            $table->timestamps();
        });

        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->string('author_name');
            $table->string('author_email')->nullable();
            $table->tinyInteger('stars')->unsigned()->default(5); // 1-5
            $table->text('review')->nullable();
            $table->nullableMorphs('rateable'); // post ou service
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('comments');
        Schema::dropIfExists('ratings');
    }
};
