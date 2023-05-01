<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sub_tasks', function (Blueprint $table) {
            $table->bigInteger('task_id')->unsigned()->nullable();
            $table->foreign('task_id')->references('id')->on('tareas')->after('title');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sub_tasks', function (Blueprint $table) {
            //
        });
    }
};
