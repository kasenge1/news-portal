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
        Schema::create('newsposts', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->integer('subcategory_id')->nullable();
            $table->integer('user_id');
            $table->string('news_title')->unique();
            $table->string('news_slug_title');
            $table->string('image');
            $table->text('news_details');
            $table->text('tags');
            $table->string('breaking_news')->nullable();
            $table->string('top_slider')->nullable();
            $table->string('first_section_three')->nullable();
            $table->string('first_section_nine')->nullable();
            $table->string('post_date')->nullable();
            $table->string('post_month')->nullable();
            $table->string('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('newsposts');
    }
};
