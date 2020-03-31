<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foods', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')->on('users');
            $table->string('name')->charset('utf8')->collation('utf8_unicode_ci');
            $table->string('address')->charset('utf8')->collation('utf8_unicode_ci');
            $table->bigInteger('contact_no');
            $table->string('variety')->charset('utf8')->collation('utf8_unicode_ci');
            $table->string('species')->charset('utf8')->collation('utf8_unicode_ci');
            $table->string('weight');
            $table->bigInteger('amount');
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
        Schema::dropIfExists('foods');
    }
}
