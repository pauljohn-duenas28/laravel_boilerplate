<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePunchUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('punch_user_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('given_name', 45)->nullable();
            $table->string('middle_name', 45)->nullable();
            $table->string('last_name', 45)->nullable();
            $table->string('suffix', 45)->nullable();
            $table->string('position', 255)->nullable();
            $table->integer('department_id')->nullable(false);
            $table->integer('group_id')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('punch_user_details');
    }
}
