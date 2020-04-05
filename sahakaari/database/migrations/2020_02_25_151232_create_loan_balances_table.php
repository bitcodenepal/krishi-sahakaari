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
            $table->decimal('amount', 12, 5);
            $table->bigInteger('payment')->default(0);
            $table->mediumInteger('interest');
            $table->mediumInteger('extra_interest')->nullable();
            $table->decimal('interest_amount', 12, 5)->default(0);
            $table->decimal('loan_amount', 12, 5)->default(0);
            $table->integer('loan_duration')->default(0);
            $table->string('remarks')->charset('utf8')->collation('utf8_unicode_ci')->nullable();
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
        Schema::dropIfExists('loan_balances');
    }
}
