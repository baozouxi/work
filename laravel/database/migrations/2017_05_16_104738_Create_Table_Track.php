<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
class CreateTableTrack extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tracks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('book_id')->unsigned()->index();
            $table->text('content')->nullable();
            $table->timestamp('add_time')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('next_time')->nullable();
            $table->string('filepath','255')->nullable();
            $table->integer('admin_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tracks');
    }
}
