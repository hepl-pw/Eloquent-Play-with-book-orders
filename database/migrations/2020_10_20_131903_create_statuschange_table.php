<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusChangeTable extends Migration
{
    public function up()
    {
        Schema::create('statuschanges', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('order_id')->unsigned();
            $table->integer('status_id')->unsigned();
        });
    }

    public function down()
    {
        Schema::drop('statuschanges');
    }
}
