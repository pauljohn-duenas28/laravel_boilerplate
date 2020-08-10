<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePunchEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('punch_events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('event_code', 45)->nullable(false);
            $table->string('name', 75)->nullable(false);
            $table->string('description', 300)->nullable();
            $table->unsignedBigInteger('event_type_id')->nullable(false);
            $table->foreign('event_type_id')
                ->references('id')->on('punch_event_type_companies');
            $table->unsignedBigInteger('sub_event_type_id')->nullable();
            $table->foreign('sub_event_type_id')
                ->references('id')->on('punch_sub_event_type');
            $table->integer('attendee_type_id')->nullable(false); //FK?
                // ->references('id')->on('punch_sys_roles');
            $table->unsignedBigInteger('company_id')->nullable(false);
            $table->foreign('company_id')
                ->references('id')->on('punch_companies');
            $table->integer('slots_no')->nullable()->unsigned();
            $table->unsignedBigInteger('checkin_type_id')->nullable(false); //FK?
                // ->references('id')->on('punch_sys_roles');
            $table->boolean('checkout_option')->nullable(false)->unsigned()->default(0);
            $table->unsignedBigInteger('event_experience_id')->nullable(false); //FK
                // ->references('id')->on('punch_sys_roles');
            $table->string('livestream_link', 255)->nullable();
            $table->string('building_addrress', 255)->nullable();
            $table->string('floor_room_number', 45)->nullable();
            $table->dateTime('date_event_start')->nullable(false);
            $table->dateTime('date_event_end')->nullable(false);
            $table->dateTime('date_registration')->nullable(false);
            $table->string('related_link', 255)->nullable();
            $table->string('no_of_beneficiaries', 45)->nullable();
            $table->string('target_beneficiaries', 45)->nullable();
            $table->unsignedBigInteger('sustainable_dev_goal_id')->nullable();
            $table->foreign('sustainable_dev_goal_id')
                ->references('id')->on('punch_sustainable_dev_goal');
            $table->boolean('with_booths')->nullable(false)->default(0);
            $table->boolean('with_raffle')->nullable(false)->default(0);
            $table->string('image_banner', 255)->nullable(false);
            $table->timestamp('created_at')->nullable(false);
            $table->timestamp('updated_at')->nullable();
            $table->boolean('enabled')->unsigned()->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('punch_events');
    }
}
