<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfitClubCommissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profit_club__commissions', function (Blueprint $table) {
            $table->increments('id');
            $table->float('pro_mo');
            $table->float('pro_ms');
            $table->float('pro_am');
            $table->float('pro_zm');
            $table->float('pro_rm');
            $table->float('pro_dsm');
            $table->float('pro_sm');
            $table->float('pro_exd');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profit_club__commissions');
    }
}
