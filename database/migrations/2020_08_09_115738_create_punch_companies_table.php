<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePunchCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('punch_companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code', 45)->nullable(false);
            $table->string('name', 45)->nullable(false);
            $table->timestamp('created_at')->nullable(false);
            $table->timestamp('updated_at')->nullable();
            $table->integer('company_brand_id')->nullable(false)
                ->references('id')->on('punch_company_brands');
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
        Schema::dropIfExists('punch_companies');
    }
}
