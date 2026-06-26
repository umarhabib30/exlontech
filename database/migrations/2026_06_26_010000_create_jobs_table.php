<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('type');
            $table->string('location');
            $table->string('experience_level')->nullable();
            $table->string('salary_range')->nullable();
            $table->date('deadline')->nullable();
            $table->longText('description');
            $table->longText('responsibilities')->nullable();
            $table->longText('requirements');
            $table->longText('benefits')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
