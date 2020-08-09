<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePunchEventSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('punch_event_sessions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 45)->nullable(false);
            $table->time('time_start', 0)->nullable(false);
            $table->time('time_end', 0)->nullable(false);
            $table->string('floor_room_number', 45)->nullable();
            $table->string('description', 300)->nullable();
            $table->integer('slots_no')->nullable();
            $table->unsignedBigInteger('event_schedule_id')->nullable(false);
            $table->foreign('event_schedule_id')
                ->references('id')->on('punch_event_schedules');
            $table->integer('total_checkin')->nullable(false);
            $table->integer('total_checkout')->nullable(false);
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
        Schema::dropIfExists('punch_event_sessions');
    }
}
