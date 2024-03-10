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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->decimal('balance', 10, 2)->default(0);
            $table->boolean('delinquent')->default(false);
            $table->dateTime('created')->useCurrent();
            $table->string('invoice_prefix')->default('');
            $table->integer('next_invoice_sequence')->default(1);
            $table->json('metadata')->nullable();
            $table->json('preferred_locales')->nullable();
            $table->string('address')->nullable();
            $table->text('description')->nullable();
            $table->boolean('livemode')->default(false);
            $table->string('currency')->nullable();
            $table->string('default_source')->nullable();
            $table->json('discount')->nullable();
            $table->json('shipping')->nullable();
            $table->string('phone')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
