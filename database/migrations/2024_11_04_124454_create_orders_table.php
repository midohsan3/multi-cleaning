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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('country_id')->nullable()->constrained('countries')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('company_id')->nullable()->constrained('companies')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('customer_id')->nullable()->constrained('customers')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('service_id')->nullable()->constrained('services')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('ref')->nullable();
            $table->smallInteger('duration_by')->default(1)->comment('1=>hours, 2=>days, 3=>month');
            $table->smallInteger('duration')->default(1);
            $table->double('cost')->default(0);
            $table->double('total')->default(0);
            $table->timestamp('started_at')->nullable();
            $table->timestamp('end_at')->nullable();
            $table->smallInteger('status')->default(0)->comment('0=>new, 1=>approved,3=>in schedule,4=>complete,5=>canceled');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};