<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePatients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name','20');
            $table->smallInteger('age');
            $table->tinyInteger('gender');
            $table->string('phone', '15');
            $table->integer('dis');
            $table->integer('dep');
            $table->integer('ads');
            $table->smallInteger('province');
            $table->smallInteger('city');
            $table->smallInteger('town');
            $table->string('medical_num', '20');
            $table->timestamp('add_time')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->text('content')->nullable();
            $table->integer('admin_id');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
