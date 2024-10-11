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
        Schema::create('countries_has_activities', function (Blueprint $table) {
           $table->foreignId('country_id')->constrained('countries')->cascadeOnDelete()->cascadeOnUpdate();
           $table->foreignId('activity_id')->constrained('activities')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries_has_activities');
    }
};