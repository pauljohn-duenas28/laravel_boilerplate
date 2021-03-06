<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePunchDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('punch_departments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 255)->nullable(false);
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
        Schema::dropIfExists('punch_departments');
    }
}
