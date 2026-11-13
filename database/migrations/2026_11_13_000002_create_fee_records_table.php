<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('fee_records', function (Blueprint $table) {
            $table->id();
            $table->string('student_name');
            $table->string('contact_number', 40);
            $table->string('id_card_number', 40);
            $table->string('father_name');
            $table->string('father_contact_number', 40);
            $table->text('address');
            $table->date('date_of_birth');
            $table->string('degree');
            $table->date('date_of_admission');
            $table->string('course_duration');
            $table->foreignId('course_id')->constrained()->restrictOnDelete();
            $table->foreignId('instructor_id')->constrained()->restrictOnDelete();
            $table->decimal('total_fee', 12, 2);
            $table->decimal('amount_paid', 12, 2)->default(0);
            $table->timestamps();
        });
    }

    public function down(): void { Schema::dropIfExists('fee_records'); }
};
