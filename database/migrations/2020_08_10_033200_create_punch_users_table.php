<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePunchUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('punch_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email_address', 45)->nullable(false);
            $table->string('password', 45)->nullable(false);
            $table->unsignedBigInteger('user_detail_id')->nullable(false);
            $table->foreign('user_detail_id')
                ->references('id')->on('punch_user_details');
            $table->unsignedBigInteger('company_id')->nullable(false);
            $table->foreign('company_id')
                ->references('id')->on('punch_companies');
            $table->unsignedBigInteger('sys_role_id')->nullable(false);
            $table->foreign('sys_role_id')
                ->references('id')->on('punch_sys_roles');
            $table->dateTime('last_login')->nullable();
            $table->boolean('is_activated')->nullable();
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
        Schema::dropIfExists('punch_users');
    }
}
