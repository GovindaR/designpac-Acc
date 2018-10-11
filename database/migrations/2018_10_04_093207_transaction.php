<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Transaction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction', function ($table) {
    $table->increments('id');
    $table->unsignedInteger('user_id');
    $table->string('txn_id');
    $table->string('detail');
    $table->string('download');
    $table->integer('amount');
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
       Schema::table('transaction', function (Blueprint $table) {
            //
        });
    }
}
