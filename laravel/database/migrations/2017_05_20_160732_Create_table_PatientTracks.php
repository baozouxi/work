<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePatientTracks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_tracks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id');
            $table->text('content');
            $table->timestamp('add_time')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('next_time');
            $table->integer('admin_id');
            $table->string('filepath')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patient_tracks');
    }
}
