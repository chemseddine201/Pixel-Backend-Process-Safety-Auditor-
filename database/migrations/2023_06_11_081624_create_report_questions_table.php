<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('report_name_id')->constrained('report_names')->cascadeOnDelete();
            $table->unsignedBigInteger('question_id');
            $table->string('evidence');
            $table->string('evidence_attachment');
            $table->string('finding');
            $table->string('finding_attachment');
            $table->string('score');
            $table->string('conformity_level');
            $table->string('recommendations');
            $table->string('recommendations_attachment');
            $table->string('process_saftey_element');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('report_questions');
    }
}
