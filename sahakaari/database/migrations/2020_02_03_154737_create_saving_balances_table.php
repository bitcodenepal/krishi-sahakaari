<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSavingBalancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saving_balances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')->on('users');
            $table->unsignedBigInteger('saving_id');
            $table->foreign('saving_id')
                ->references('id')->on('savings');
            $table->text('description')->charset('utf8')->collation('utf8_unicode_ci')->nullable();
            $table->bigInteger('balance');
            $table->bigInteger('withdraw')->nullable();
            $table->bigInteger('deposit')->nullable();
            $table->bigInteger('interest_amount')->default(0);
            $table->bigInteger('saving_amount')->default(0);
            $table->string('remarks')->charset('utf8')->collation('utf8_unicode_ci')->nullable();
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
        Schema::dropIfExists('saving_balances');
    }
}
