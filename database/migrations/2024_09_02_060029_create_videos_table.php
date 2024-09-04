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
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Changed from 'link' to 'title'
            $table->string('slug')->unique(); // Added 'slug' for SEO-friendly URLs
            $table->string('url'); // Added field for the video URL
            $table->string('thumbnail')->nullable(); // Thumbnail image URL
            $table->text('description')->nullable(); // Added 'description' field for the video
            $table->foreignId('category_id')->constrained()->cascadeOnDelete(); // Foreign key to 'categories' table
            $table->foreignId('author_id')->constrained()->cascadeOnDelete(); // Foreign key to 'authors' table
            $table->boolean('is_featured')->default(false); // Added 'is_featured' field
            $table->enum('is_active', ['active', 'not_active'])->default('not_active'); // Enum for active status
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('videos');
    }
};