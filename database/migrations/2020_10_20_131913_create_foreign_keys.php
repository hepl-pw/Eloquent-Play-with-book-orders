cd ../<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeys extends Migration
{
    public function up()
    {
        Schema::table('order_status', function (Blueprint $table) {
            $table->foreign('order_id')->references('id')->on('orders')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
        Schema::table('order_status', function (Blueprint $table) {
            $table->foreign('status_id')->references('id')->on('statuses')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });

    }

    public function down()
    {
        Schema::table('order_status', function (Blueprint $table) {
            $table->dropForeign('order_status_order_id_foreign');
        });
        Schema::table('order_status', function (Blueprint $table) {
            $table->dropForeign('order_status_status_id_foreign');
        });
    }
}
