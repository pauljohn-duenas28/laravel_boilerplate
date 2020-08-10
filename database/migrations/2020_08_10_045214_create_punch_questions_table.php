<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePunchQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('punch_questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',300)->nullable(false);
            $table->unsignedBigInteger('question_type_id')->nullable(false);
            $table->foreign('question_type_id')
                ->references('id')->on('punch_question_type');
            $table->unsignedBigInteger('company_id')->nullable(false);
            $table->foreign('company_id')
                ->references('id')->on('punch_companies');
            $table->timestamp('created_at')->nullable(false);
            $table->timestamp('updated_at')->nullable();
            $table->boolean('enabled')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('punch_questions');
    }
}
