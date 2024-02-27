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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->uuid('opd_no')->unique('patient_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->nullable();
            $table->string('phone');
            $table->date('date_of_birth');
            $table->longText('resident_address');
            $table->boolean('is_staff')->default(0)->nullable();
            $table->string('staff_id')->nullable();
            $table->string('em_cont_first_name');
            $table->string('em_cont_last_name');
            $table->string('em_cont_phone');
            $table->string('em_cont_relation');
            $table->string('em_cont_resident_address');
            $table->string('user');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
