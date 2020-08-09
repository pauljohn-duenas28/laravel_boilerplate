<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePunchEventSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('punch_event_schedules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('date_event')->nullable(false);
            $table->time('time_start', 0)->nullable(false);
            $table->time('time_end', 0)->nullable(false);
            $table->integer('event_id')->nullable()
                ->references('id')->on('punch_events');
            $table->integer('total_checkin')->nullable(false)->default(0);
            $table->integer('total_checkout')->nullable(false)->default(0);
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
        Schema::dropIfExists('punch_event_schedules');
    }
}
