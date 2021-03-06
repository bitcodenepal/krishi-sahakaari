<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')->on('users');
            $table->unsignedBigInteger('share_no')->foreign('share_no')->references('no')->on('shares');
            $table->string("loan_type")->charset('utf8')->collation('utf8_unicode_ci');
            $table->decimal('amount',12,5);
            $table->mediumInteger('interest');
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
        Schema::dropIfExists('loans');
    }
}
