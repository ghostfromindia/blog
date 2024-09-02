<?php

use App\Models\Product;
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
        Schema::create('product_variants', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Product::class);
            $table->string('slug')->unique();
            $table->string('title');
            $table->string('short_description')->nullable();
            $table->text('description')->nullable();
            $table->integer('image_id')->nullable();
            $table->float('mrp')->nullable();
            $table->float('selling_price')->nullable();
            $table->enum('promo_type',['percentage','flat'])->default('percentage');
            $table->float('promo_value')->nullable();
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
        Schema::dropIfExists('product_variants');
    }
};
