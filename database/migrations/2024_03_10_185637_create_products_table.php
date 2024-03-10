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
            $table->string('object');
            $table->boolean('active');
            $table->dateTime('created');
            $table->string('default_price')->nullable();
            $table->text('description')->nullable();
            $table->json('images');
            $table->json('features');
            $table->boolean('livemode');
            $table->json('metadata');
            $table->string('name');
            $table->json('package_dimensions')->nullable();
            $table->boolean('shippable')->nullable();
            $table->string('statement_descriptor')->nullable();
            $table->string('tax_code')->nullable();
            $table->string('unit_label')->nullable();
            $table->dateTime('updated');
            $table->string('url')->nullable();
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
