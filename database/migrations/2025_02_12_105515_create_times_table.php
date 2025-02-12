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
        Schema::create('times', function (Blueprint $table) {
            $table->id();
            $table->foreignId('doctor_id')->constrained()->onDelete('cascade');
            $table->string('date');
            $table->string('day');
            $table->string('time1');
            $table->string('time2');
            $table->string('time3');
            $table->string('time4');
            $table->string('time5');
            $table->string('time6');
            $table->string('time7');
            $table->string('time8');
            $table->string('time9');
            $table->string('time10');
            $table->string('time11');
            $table->string('time12');
            $table->string('time13');
            $table->string('time14');
            $table->string('time15');
            $table->string('time16');
            $table->string('time17');
            $table->string('time18');
            $table->string('time19');
            $table->string('time20');
            $table->string('time21');
            $table->string('time22');
            $table->string('time23');
            $table->string('time24');
            $table->string('time25');
            $table->string('time26');
            $table->string('time27');
            $table->string('time28');
            $table->string('time29');
            $table->string('time30');
            $table->string('time31');
            $table->string('time32');
            $table->string('time33');
            $table->string('time34');
            $table->string('time35');
            $table->string('time36');
            $table->string('time37');
            $table->string('time38');
            $table->string('time39');
            $table->string('time40');
            $table->string('time41');
            $table->string('time42');
            $table->string('time43');
            $table->string('time44');
            $table->string('time45');
            $table->string('time46');
            $table->string('time47');
            $table->string('time48');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('times');
    }
};