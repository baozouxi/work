<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTelConsults extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tel_consults', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', '20');
            $table->smallInteger('age')->unsigned();
            $table->tinyInteger('gender')->unsigned();
            $table->string('phone', '13');
            $table->integer('dis')->unsigned();
            $table->integer('way')->unsigned();
            $table->tinyInteger('status')->unsigned()->default('0');
            $table->string('filepath')->nullable();
            $table->smallInteger('province')->unsigned();
            $table->smallInteger('city')->unsigned();
            $table->smallInteger('town')->unsigned();
            $table->string('address')->nullable();
            $table->text('content');
            $table->integer('admin_id')->unsigned();
            $table->tinyInteger('availability')->unsigned()->default('1');
            $table->timestamp('track_time')->default(DB::raw('CURRENT_TIMESTAMP'));
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
        Schema::dropIfExists('tel_consults');
    }
}
