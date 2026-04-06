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
        Schema::create('trading_accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('broker_name', 100);
            $table->string('account_number', 50);
            $table->string('server', 100);
            $table->string('password', 100);
            $table->decimal('balance', 12, 2)->default(0);
            $table->decimal('equity', 12, 2)->default(0);
            $table->decimal('margin', 12, 2)->default(0);
            $table->decimal('free_margin', 12, 2)->default(0);
            $table->enum('account_type', ['LIVE', 'DEMO'])->default('DEMO');
            $table->enum('status', ['ACTIVE', 'INACTIVE', 'SUSPENDED'])->default('ACTIVE');
            $table->boolean('is_copy_trading_enabled')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trading_accounts');
    }
};
