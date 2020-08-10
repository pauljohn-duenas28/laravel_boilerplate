<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePunchSessionRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('punch_session_registrations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('event_session_id')->nullable(false);
            $table->foreign('event_session_id')
                ->references('id')->on('punch_event_sessions');
            $table->unsignedBigInteger('user_id')->nullable(false);
            $table->foreign('user_id')
                ->references('id')->on('punch_users');
            $table->integer('usher_id')->nullable();
            $table->boolean('is_cancelled')->default(0);
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
        Schema::dropIfExists('punch_session_registrations');
    }
}
