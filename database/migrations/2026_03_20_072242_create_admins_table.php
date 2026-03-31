<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id('admin_id');

            $table->string('admin_name');

            $table->foreignId('department_id')
                  ->constrained('department','department_id')
                  ->cascadeOnDelete();

            $table->string('admin_email')->unique();

            $table->boolean('can_edit_status')->default(false);
            $table->boolean('can_approve_clearance')->default(false);
            $table->boolean('can_add_remarks')->default(false);

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};