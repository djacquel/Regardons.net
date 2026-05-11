<?php

// Laravel uses "migrations" to build your database tables.
// up() runs when you migrate, down() runs when you rollback.

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Schema::create() creates a new table called "articles"
        Schema::create('articles', function (Blueprint $table) {

            // Auto-incrementing primary key (id: 1, 2, 3…)
            $table->id();

            // Links each article to a user (its author)
            // cascadeOnDelete() = if the user is deleted, their articles are deleted too
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            // The article title — a short string (max 255 chars)
            $table->string('title');

            // The article body — "text" stores long paragraphs
            $table->text('content');

            $table->string('slug')->unique()->nullable();

            // Automatically adds "created_at" and "updated_at" columns
            $table->timestamps();
        });
    }

    public function down(): void
    {
        // Drops (deletes) the table if we roll back
        Schema::dropIfExists('articles');
    }
};