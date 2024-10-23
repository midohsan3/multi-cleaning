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
        Schema::create('persons', function (Blueprint $table) {
            $table->id();
           $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
           $table->foreignId('nationality_id')->nullable()->constrained('nationalities')->cascadeOnDelete()->cascadeOnUpdate();
           $table->foreignId('county_id')->nullable()->constrained('countries')->cascadeOnDelete()->cascadeOnUpdate();
           $table->smallInteger('gender')->default(0)->comment('1=>Male, 2=>Female');
            $table->timestamp('birth_date')->nullable();
            $table->string('located_at')->nullable();
            $table->string('specialist')->nullable();
            $table->string('cv')->nullable();
            $table->smallInteger('status')->default(0)->comment('0=>Inactive, 1=>Active');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persons');
    }
};