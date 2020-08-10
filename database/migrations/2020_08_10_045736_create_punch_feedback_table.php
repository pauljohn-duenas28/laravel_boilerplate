<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePunchFeedbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('punch_feedback', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('answer', 300)->nullable(false);
            $table->unsignedBigInteger('event_id')->nullable(false);
            $table->foreign('event_id')
                ->references('id')->on('punch_events');
            $table->unsignedBigInteger('event_type_question_id')->nullable(false);
            $table->foreign('event_type_question_id')
                ->references('id')->on('punch_event_type_questions');
            $table->unsignedBigInteger('user_id')->nullable(false);
            $table->foreign('user_id')
                ->references('id')->on('punch_users');
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
        Schema::dropIfExists('punch_feedback');
    }
}
