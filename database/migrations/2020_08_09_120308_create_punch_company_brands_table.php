<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePunchCompanyBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('punch_company_brands', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('logo', 255)->nullable(false);
            $table->string('logo_bg', 255)->nullable(false);
            $table->string('primary_color', 45)->nullable(false);
            $table->string('secondary_color', 45)->nullable(false);
            $table->string('others_color', 45)->nullable(false);
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
        Schema::dropIfExists('punch_company_brands');
    }
}
