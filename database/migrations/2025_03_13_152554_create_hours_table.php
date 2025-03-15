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
        Schema::create('hours', function (Blueprint $table) {
            $table->id();
            $table->foreignId('time_id')->constrained()->unique()->onDelete('cascade');
            $table->string("12:00_12:15")->default("0")->nullable();
            $table->string("12:15_12:30")->default("0")->nullable();
            $table->string("12:30_12:45")->default("0")->nullable();
            $table->string("12:45_13:00")->default("0")->nullable();
            $table->string("13:00_13:15")->default("0")->nullable();
            $table->string("13:15_13:30")->default("0")->nullable();
            $table->string("13:30_13:45")->default("0")->nullable();
            $table->string("13:45_14:00")->default("0")->nullable();
            $table->string("14:00_14:15")->default("0")->nullable();
            $table->string("14:15_14:30")->default("0")->nullable();
            $table->string("14:30_14:45")->default("0")->nullable();
            $table->string("14:45_15:00")->default("0")->nullable();
            $table->string("15:00_15:15")->default("0")->nullable();
            $table->string("15:15_15:30")->default("0")->nullable();
            $table->string("15:30_15:45")->default("0")->nullable();
            $table->string("15:45_16:00")->default("0")->nullable();
            $table->string("16:00_16:15")->default("0")->nullable();
            $table->string("16:15_16:30")->default("0")->nullable();
            $table->string("16:30_16:45")->default("0")->nullable();
            $table->string("16:45_17:00")->default("0")->nullable();
            $table->string("17:00_17:15")->default("0")->nullable();
            $table->string("17:15_17:30")->default("0")->nullable();
            $table->string("17:30_17:45")->default("0")->nullable();
            $table->string("17:45_18:00")->default("0")->nullable();
            $table->string("18:00_18:15")->default("0")->nullable();
            $table->string("18:15_18:30")->default("0")->nullable();
            $table->string("18:30_18:45")->default("0")->nullable();
            $table->string("18:45_19:00")->default("0")->nullable();
            $table->string("19:00_19:15")->default("0")->nullable();
            $table->string("19:15_19:30")->default("0")->nullable();
            $table->string("19:30_19:45")->default("0")->nullable();
            $table->string("19:45_20:00")->default("0")->nullable();
            $table->string("20:00_20:15")->default("0")->nullable();
            $table->string("20:30_20:45")->default("0")->nullable();
            $table->string("20:45_21:00")->default("0")->nullable();
            $table->string("21:00_21:15")->default("0")->nullable();
            $table->string("21:15_21:30")->default("0")->nullable();
            $table->string("21:30_21:45")->default("0")->nullable();
            $table->string("21:45_22:00")->default("0")->nullable();
            $table->string("22:15_22:30")->default("0")->nullable();
            $table->string("22:30_22:45")->default("0")->nullable();
            $table->string("22:45_23:00")->default("0")->nullable();
            $table->string("23:00_23:15")->default("0")->nullable();
            $table->string("23:30_23:45")->default("0")->nullable();
            $table->string("23:45_00:00")->default("0")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hours');
    }
};
