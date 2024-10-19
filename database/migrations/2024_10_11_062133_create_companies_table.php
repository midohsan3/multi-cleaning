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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('country_id')->nullable()->constrained('countries')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('activity_id')->nullable()->constrained('activities')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('package_id')->nullable()->constrained('packages')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('url')->nullable()->unique();
            $table->string('name_en')->nullable();
            $table->string('name_ar')->nullable();
            $table->string('license')->nullable();
            $table->text('about_en')->nullable();
            $table->text('about_ar')->nullable();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->smallInteger('status')->default(0)->comment('0=>Inactive, 1=>Active');
            $table->smallInteger('register_by')->default(2)->comment('1=>System, 2=>Register');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
