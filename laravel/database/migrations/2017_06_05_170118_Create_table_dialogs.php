<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDialogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dialogs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('add_time')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->datetime('date');
            $table->integer('pcswt')->default('0');
            $table->integer('sjswt')->default('0');
            $table->integer('web_tel')->default('0');
            $table->integer('weixin')->default('0');
            $table->integer('zhuaqu')->default('0');
            $table->integer('admin_id');
            $table->text('content')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dialogs');
    }
}
