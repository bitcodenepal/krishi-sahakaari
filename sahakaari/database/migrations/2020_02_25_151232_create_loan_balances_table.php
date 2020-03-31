<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoanBalancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_balances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')->on('users');
            $table->unsignedBigInteger('loan_id');
            $table->foreign('loan_id')
                ->references('id')->on('loans');
            $table->bigInteger('amount');
            $table->bigInteger('payment')->nullable();
            $table->mediumInteger('interest');
            $table->mediumInteger('extra_interest')->nullable();
            $table->string('remarks')->nullable();
            $table->string('creation_date')->charset('utf8')->collation('utf8_unicode_ci')->nullable();
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
        Schema::dropIfExists('loan_balances');
    }
}
