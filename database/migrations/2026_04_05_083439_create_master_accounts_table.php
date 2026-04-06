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
        Schema::create('master_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('broker_name');
            $table->string('account_number');
            $table->string('server');
            $table->decimal('balance', 15, 2)->default(0);
            $table->decimal('equity', 15, 2)->default(0);
            $table->enum('status', ['ACTIVE', 'INACTIVE', 'SUSPENDED'])->default('ACTIVE');
            $table->text('description')->nullable();
            $table->decimal('min_copy_amount', 15, 2)->default(100);
            $table->decimal('max_copy_amount', 15, 2)->default(10000);
            $table->decimal('copy_fee_percentage', 5, 2)->default(5.00);
            $table->boolean('is_public')->default(true);
            $table->json('performance_stats')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_accounts');
    }
};
