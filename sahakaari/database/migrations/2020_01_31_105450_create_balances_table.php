<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBalancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')->on('users');
            $table->integer('share_no')->foreign('share_no')->references('no')->on('shares');
            $table->integer('receipt')->nullable();
            $table->text('description')->nullable()->collation('utf8_unicode_ci');
            $table->integer('kittaa');
            $table->bigInteger('balance');
            $table->bigInteger('withdraw')->nullable();
            $table->bigInteger('deposit')->nullable();
            $table->string('remarks')->nullable()->collation('utf8_unicode_ci');
            $table->string('creation_date')->nullable();
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
        Schema::dropIfExists('balances');
    }
}
