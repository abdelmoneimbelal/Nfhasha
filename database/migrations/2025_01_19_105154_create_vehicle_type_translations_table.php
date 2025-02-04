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
        Schema::create('vehicle_type_translations', function (Blueprint $table) {
            $table->id();
            $table->string('locale',5)->index();
            $table->unsignedBigInteger('vehicle_type_id')->unsigned();
            $table->unique(['vehicle_type_id', 'locale']);
            $table->foreign('vehicle_type_id')->references('id')->on('vehicle_types')->onDelete('cascade');
            $table->string('title',50);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_type_translations');
    }
};
