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
        Schema::create('trades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('trading_account_id')->constrained()->onDelete('cascade');
            $table->string('symbol', 20);
            $table->enum('type', ['BUY', 'SELL']);
            $table->decimal('lot_size', 10, 2);
            $table->decimal('entry_price', 10, 5);
            $table->decimal('exit_price', 10, 5)->nullable();
            $table->decimal('profit_loss', 12, 2)->default(0);
            $table->enum('status', ['OPEN', 'CLOSED', 'PENDING'])->default('OPEN');
            $table->text('notes')->nullable();
            $table->timestamp('opened_at')->nullable();
            $table->timestamp('closed_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trades');
    }
};
