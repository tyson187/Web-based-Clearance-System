<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('clearances', function (Blueprint $table) {
            $table->id('clearance_id');

            $table->foreignId('department_id')
                  ->constrained('department','department_id')
                  ->cascadeOnDelete();

            $table->foreignId('student_id')
                  ->constrained('students','student_id')
                  ->cascadeOnDelete();

            $table->boolean('inactive_status')->default(false);
            $table->text('remarks')->nullable();

            $table->date('date_processed')->nullable();

            $table->string('schoolYr');
            $table->string('year_type');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clearances');
    }
};
