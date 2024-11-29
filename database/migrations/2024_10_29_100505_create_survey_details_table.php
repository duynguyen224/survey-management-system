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
        Schema::create('survey_details', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('question_title');
            $table->string('question_description');
            $table->unsignedTinyInteger('question_type');
            $table->unsignedTinyInteger('question_number');
            $table->unsignedTinyInteger('number_of_choices');
            $table->json('choices');
            $table->foreignUuid('survey_id')->nullable()->constrained('surveys')->onUpdate('cascade')->onDelete('set null');

            // Default attributes
            $table->foreignUuid('created_by_id')->nullable()->constrained('users')->onUpdate('cascade')->onDelete('set null');
            $table->string('created_by_name', 50)->nullable();
            $table->dateTime('created_at');
            $table->foreignUuid('updated_by_id')->nullable()->constrained('users')->onUpdate('cascade')->onDelete('set null');
            $table->string('updated_by_name', 50)->nullable();
            $table->dateTime('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('survey_details');
    }
};
