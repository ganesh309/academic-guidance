<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Reference Tables
        Schema::create('academics', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        Schema::create('batches', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        Schema::create('genders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        Schema::create('semesters', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        Schema::create('states', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('country_id');
        });

        Schema::create('districts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('state_id');
        });

        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('academic_id');
        });

        Schema::create('degrees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('school_id');
        });

        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('degree_id');
            $table->foreignId('semester_id');
        });

        // Users & Roles
        Schema::create('admin', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password');
        });

        Schema::create('faculties', function (Blueprint $table) {
            $table->id();
            $table->string('uid')->nullable();
            $table->string('fname');
            $table->string('lname');
            $table->string('email');
            $table->string('mobile');
            $table->foreignId('gender_id');
            $table->foreignId('school_id');
            $table->foreignId('country_id');
            $table->foreignId('state_id');
            $table->foreignId('district_id');
        });

        Schema::create('mentors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('faculty_id')->nullable();
            $table->string('email')->nullable();
            $table->string('password');
            $table->boolean('password_updated')->default(0);
            $table->string('otp')->nullable();
            $table->string('token')->nullable();
            $table->timestamps();
        });

        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('registration_no')->nullable();
            $table->string('fname')->nullable();
            $table->string('lname');
            $table->string('uid')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->string('batch_id')->nullable();
            $table->foreignId('semester_id')->nullable();
            $table->decimal('sgpa', 4, 2)->nullable();
            $table->foreignId('gender_id')->nullable();
            $table->foreignId('academic_id')->nullable();
            $table->foreignId('school_id')->nullable();
            $table->foreignId('degree_id')->nullable();
            $table->foreignId('country_id')->nullable();
            $table->foreignId('state_id')->nullable();
            $table->foreignId('district_id')->nullable();
        });

        Schema::create('mentees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id');
            $table->string('email')->nullable();
            $table->string('password');
            $table->boolean('password_updated')->default(0);
            $table->string('otp')->nullable();
            $table->string('token')->nullable();
            $table->foreignId('mentor_id')->nullable();
            $table->timestamps();
        });

        // App Data
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id');
            $table->date('date');
            $table->foreignId('subject_id');
            $table->boolean('attendance')->default(0);
        });

        Schema::create('interactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mentee_id')->nullable();
            $table->date('date')->nullable();
            $table->string('attendance', 1000);
            $table->string('interaction', 1000)->nullable();
            $table->string('problem_understood', 2000)->nullable();
            $table->string('remedy', 2000)->nullable();
            $table->string('observation', 2000)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('interactions');
        Schema::dropIfExists('attendances');
        Schema::dropIfExists('mentees');
        Schema::dropIfExists('students');
        Schema::dropIfExists('mentors');
        Schema::dropIfExists('faculties');
        Schema::dropIfExists('admin');
        Schema::dropIfExists('subjects');
        Schema::dropIfExists('degrees');
        Schema::dropIfExists('schools');
        Schema::dropIfExists('districts');
        Schema::dropIfExists('states');
        Schema::dropIfExists('countries');
        Schema::dropIfExists('semesters');
        Schema::dropIfExists('genders');
        Schema::dropIfExists('batches');
        Schema::dropIfExists('academics');
    }
};
