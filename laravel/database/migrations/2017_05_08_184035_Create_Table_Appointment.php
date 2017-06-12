<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
class CreateTableAppointment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', '30');
            $table->tinyInteger('age')->unsigned();
            $table->char('gender', '4');
            $table->char('phone', '20');
            $table->smallInteger('disease')->unsigned();
            $table->smallInteger('way')->unsigned();
            $table->timestamp('postdate')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('filepath', '255')->nullable();
            $table->integer('province');
            $table->integer('city');
            $table->integer('town');
            $table->string('address', '255')->nullable();
            $table->string('content', '255');
            $table->string('job', '200')->nullable();
            $table->string('qq', '20')->nullable();
            $table->string('weixin', '30')->nullable();
            $table->string('keyword', '255')->nullable();
            $table->string('website', '50')->nullable();
            $table->string('source', '50')->nullable();
            $table->integer('admin_id')->unsigned();
            $table->timestamp('add_time')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('res')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
