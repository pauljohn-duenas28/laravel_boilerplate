<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePunchSysRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('punch_sys_roles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 45)->nullable(false);
            $table->text('permission')->nullable(false);
            $table->timestamp('date_created')->nullable(false);
            $table->timestamp('date_updated')->nullable();
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
        Schema::dropIfExists('punch_sys_roles');
    }
}
