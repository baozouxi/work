<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateTableRankRecords extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rank_records', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('rank_date');
            $table->integer('cost');
            $table->integer('click');
            $table->integer('show_times');
            $table->integer('admin_id');
            $table->integer('rank_way');
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
        Schema::dropIfExists('rank_records');
    }
}
