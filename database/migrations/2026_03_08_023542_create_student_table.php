<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id('student_id');

            $table->string('student_name');

            $table->foreignId('department_id')
                  ->constrained('departments','department_id')
                  ->cascadeOnDelete();

            $table->string('student_email')->unique();
            $table->string('student_course');
            $table->string('address')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
