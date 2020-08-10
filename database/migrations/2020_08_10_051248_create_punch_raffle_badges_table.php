<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePunchRaffleBadgesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('punch_raffle_badges', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('event_id')->nullable(false);
            $table->foreign('event_id')
                ->references('id')->on('punch_events');
            $table->integer('minor')->nullable(false)->unsigned()->dafault(0);
            $table->integer('major')->nullable(false)->unsigned()->dafault(0);
            $table->integer('grand')->nullable(false)->unsigned()->dafault(0);
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
        Schema::dropIfExists('punch_raffle_badges');
    }
}
