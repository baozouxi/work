<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTakes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('takes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dose')->unsigned();
            $table->integer('doctor')->unsigned();
            $table->integer('check_cost')->unsigned();
            $table->integer('treatment_cost')->unsigned();
            $table->integer('drug_cost')->unsigned();
            $table->integer('hospitalization_cost')->unsigned();
            $table->integer('patient_id')->unsigned();
            $table->integer('admin_id')->unsigned();
            $table->text('content')->nullable();
            $table->timestamp('add_time')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('takes');
    }
}
