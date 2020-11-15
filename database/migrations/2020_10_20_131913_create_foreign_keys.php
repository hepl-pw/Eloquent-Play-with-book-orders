cd ../<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeys extends Migration
{
    public function up()
    {
        Schema::table('statuschanges', function (Blueprint $table) {
            $table->foreign('order_id')->references('id')->on('orders')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
        Schema::table('statuschanges', function (Blueprint $table) {
            $table->foreign('status_id')->references('id')->on('statuses')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });

    }

    public function down()
    {
        Schema::table('statuschanges', function (Blueprint $table) {
            $table->dropForeign('statuschanges_order_id_foreign');
        });
        Schema::table('statuschanges', function (Blueprint $table) {
            $table->dropForeign('statuschanges_status_id_foreign');
        });
    }
}
