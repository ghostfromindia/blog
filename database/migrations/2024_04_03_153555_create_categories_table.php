<?php

use App\Models\Category;
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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Category::class)->nullable();
            $table->string('slug')->unique();
            $table->string('title');
            $table->string('short_description')->nullable();
            $table->text('description')->nullable();
            $table->integer('image_id')->nullable();
            $table->integer('banner_image_id')->nullable();
            $table->integer('status' )->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
