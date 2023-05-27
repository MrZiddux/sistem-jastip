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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('recipient_id');
            $table->string('tracking_number');
            $table->double('weight', 10, 2);
            $table->integer('price');
            $table->unsignedBigInteger('pricing_option_id');
            $table->timestamps();

            $table->foreign('recipient_id')->references('id')->on('recipients');
            $table->foreign('pricing_option_id')->references('id')->on('pricing_options');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
