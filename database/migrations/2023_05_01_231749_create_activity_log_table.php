<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivityLogTable extends Migration
{
    public function up()
    {
        Schema::create('activity_log', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('log_name')->nullable();
            $table->nullableMorphs('subject');
            $table->nullableMorphs('causer');
            $table->text('properties')->nullable();
            $table->string('event')->nullable();
            $table->timestamps();
    
            $table->index('log_name');
        });
    }
    

    public function down()
    {
        Schema::dropIfExists('activity_log');
    }
}
