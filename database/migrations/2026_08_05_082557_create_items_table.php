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
        Schema::create('items', function (Blueprint $table) {
            $table->id();

            $table->foreignId('category_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('name');

            $table->text('description')->nullable();

            $table->date('purchase_date');

            $table->date('sold_at')->nullable();

            $table->integer('quantity')->default(1);

            $table->decimal('purchase_price', 10, 2);

            $table->decimal('expected_selling_price', 10, 2)->nullable();

            $table->decimal('actual_selling_price', 10, 2)->nullable();

            $table->decimal('shipping_fee', 10, 2)->default(0);

            $table->decimal('other_expenses', 10, 2)->default(0);

            $table->enum('status', ['available', 'sold'])
                ->default('available');

            $table->text('notes')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
