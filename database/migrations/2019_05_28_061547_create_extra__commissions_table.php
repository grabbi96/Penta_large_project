<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExtraCommissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        $ex_com_am = 20;
//        $ex_com_zm = 15;
//        $ex_com_rm = 6.67;
//        $ex_com_dsm = 2.67;
//        $ex_com_sm = 1.6;
//        $ex_com_exd = 1.6;
        Schema::create('extra__commissions', function (Blueprint $table) {
            $table->increments('id');
            $table->float('ex_com_am');
            $table->float('ex_com_zm');
            $table->float('ex_com_rm');
            $table->float('ex_com_dsm');
            $table->float('ex_com_sm');
            $table->float('ex_com_exd');
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
        Schema::dropIfExists('extra__commissions');
    }
}
