<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePunchSubEventTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('punch_sub_event_type', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 45)->nullable(false);
            $table->string('description', 255)->nullable();
            $table->integer('event_type_company_id')->nullable(false)
                ->references('id')->on('punch_event_type_companies');
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
        Schema::dropIfExists('punch_sub_event_type');
    }
}
