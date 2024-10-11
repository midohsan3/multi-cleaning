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
            $table->string('name_en');
            $table->string('name_ar');
            $table->double('price',6)->default(0);
            $table->double('old_price',6)->default(0);
            $table->smallInteger('status')->default(0)->comment('0=>Inactive, 1=>Active');
            $table->text('description_en')->nullable();
            $table->text('description_ar')->nullable();
            $table->text('keywords_en')->nullable();
            $table->text('keywords_ar')->nullable();
            $table->string('og_image')->nullable();
            $table->softDeletes();
            $table->timestamps();
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
