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
        Schema::create('reserves', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained()->references('id')->on('patients')->onDelete('cascade');
            $table->foreignId('doctor_id')->constrained()->references('id')->on('doctors')->onDelete('cascade');
            $table->string('start_visit_hour');
            $table->string('end_visit_hour');
            $table->string('visit_day');
            $table->string('visit_date');
            $table->boolean("is_visited")->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reserves');
    }
};
