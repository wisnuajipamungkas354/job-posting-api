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
        Schema::create('freelancer_services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('general_id')->constrained()
            ->cascadeOnDelete()
            ->cascadeOnUpdate();
            $table->string('title');
            $table->string('job_category');
            $table->text('description');
            $table->integer('price');
            $table->boolean('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('freelancer_services');
    }
};
