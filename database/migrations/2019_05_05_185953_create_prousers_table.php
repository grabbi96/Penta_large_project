<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prousers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pid')->unique();
            $table->string('name')->nullable();
            $table->string('refference_pid');
            $table->string('placement_pid');
            $table->string('phone_number');
            $table->string('password');
            $table->string('rank')->nullable();
            $table->double('sell_balance')->nullable();
            $table->double('reference_balance')->nullable();
            $table->double('profit_club_balance')->nullable();
            $table->double('extra_sell_balance')->nullable();
            $table->double('total_balance')->nullable();
            $table->integer('rank_point')->nullable();
            $table->boolean('profit_club_member')->nullable();
            $table->integer('withdraw_amount')->nullable();
            $table->integer('withdraw_token')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('prousers');
    }
}
