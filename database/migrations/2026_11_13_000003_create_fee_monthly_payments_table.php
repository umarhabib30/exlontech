<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('fee_monthly_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fee_record_id')->constrained()->cascadeOnDelete();
            $table->date('billing_month');
            $table->decimal('amount_due', 12, 2);
            $table->decimal('amount_paid', 12, 2)->default(0);
            $table->date('paid_at')->nullable();
            $table->timestamps();
            $table->unique(['fee_record_id', 'billing_month']);
        });
    }

    public function down(): void { Schema::dropIfExists('fee_monthly_payments'); }
};
