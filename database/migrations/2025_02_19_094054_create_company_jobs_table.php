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
        Schema::create('company_jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()
            ->cascadeOnDelete()
            ->cascadeOnUpdate();
            $table->string('job_title');
            $table->string('job_category');
            $table->enum('job_type', ['full-time', 'part-time', 'internship']);
            $table->string('job_level');
            $table->text('job_description');
            $table->integer('job_salary');
            $table->enum('job_location', ['hybrid', 'wfo', 'remote']);
            $table->date('deadline_submitted');
            $table->boolean('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_jobs');
    }
};
