<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSharesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shares', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')->on('users');
            $table->string('name')->charset('utf8')->collation('utf8_unicode_ci');
            $table->string('address')->charset('utf8')->collation('utf8_unicode_ci');
            $table->integer('no');
            $table->bigInteger('contact_no');
            $table->string('grandfather_name')->charset('utf8')->collation('utf8_unicode_ci');
            $table->string('father_name')->charset('utf8')->collation('utf8_unicode_ci');
            $table->string('gender')->charset('utf8')->collation('utf8_unicode_ci');
            $table->string('marital_status')->charset('utf8')->collation('utf8_unicode_ci');
            $table->integer('receipt')->nullable();
            $table->integer('kittaa');
            $table->bigInteger('balance');
            $table->string('spouce_name')->charset('utf8')->collation('utf8_unicode_ci')->nullable();
            $table->string('inheritant')->charset('utf8')->collation('utf8_unicode_ci')->nullable();
            $table->string('image');
            $table->text('description')->nullable()->collation('utf8_unicode_ci');
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
        Schema::dropIfExists('shares');
    }
}
