<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sms', function (Blueprint $table) {
            $table->increments('id');
            $table->text('content');
            $table->string('phone','11');
            $table->integer('admin_id');
            $table->string('error')->nullable();
            $table->tinyInteger('send_status')->default('0');
            $table->timestamp('add_time')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->datetime('send_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sms');
    }
}
