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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unique();
            $table->string('profile_picture')->nullable();
            $table->enum('gender', ['male', 'female', 'other']);
            $table->date('dob');
            $table->string('blood_group')->nullable();
            $table->string('nationality')->nullable();
            $table->foreignId('specialization_id')->nullable();
            $table->string('medical_reg_no');
            $table->enum('qualification', [
                'MBBS', 'MD', 'DO', 'DM', 'MS', 'PhD', 'Diplomas & Fellowships'
            ]);
            $table->integer('experience');
            $table->text('myself')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
