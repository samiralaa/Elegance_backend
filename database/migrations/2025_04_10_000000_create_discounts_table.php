<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->timestamp('start_date');
            $table->integer('duration')->nullable();
            $table->decimal('discount_value', 8, 2);
            $table->boolean('is_active')->default(true);
            $table->foreignId('product_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->nullable()->constrained()->onDelete('cascade');
            $table->timestamp('end_date')->nullable();
            $table->timestamps();

            // Ensure a discount is either for a product or a category, not both
            $table->index(['product_id', 'category_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('discounts');
    }
};