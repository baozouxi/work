<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRoleNav extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_with_nav', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('role_id');
            $table->text('nodes');
            $table->timestamp('add_time')->default(DB::raw('CURRENT_TIMESTAMP'));
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
        Schema::dropIfExists('role_with_nav');
    }
}
