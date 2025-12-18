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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('subcategory_id')->nullable()->constrained('subcategories')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('created_by')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
$table->string('name')->nullable()->unique();
$table->string('slug')->nullable()->unique();
$table->decimal('price',15,2)->default(0);
$table->decimal('discounted_price',15,2)->default(0);
$table->string('thumbnail')->nullable();
$table->text('description')->nullable();
$table->json('gallery')->nullable();
$table->integer('serial_no')->default(1)->nullable();
$table->string('status')->default('active')->nullable();
$table->integer('qty')->default(0)->nullable();
$table->json('attributes')->nullable();
$table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
