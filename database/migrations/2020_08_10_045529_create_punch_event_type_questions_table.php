<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePunchEventTypeQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('punch_event_type_questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('event_type_company_id')->nullable(false);
            $table->foreign('event_type_company_id')
                ->references('id')->on('punch_event_type_companies');
            $table->unsignedBigInteger('question_id')->nullable(false);
            $table->foreign('question_id')
                ->references('id')->on('punch_questions');
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
        Schema::dropIfExists('punch_event_type_questions');
    }
}
