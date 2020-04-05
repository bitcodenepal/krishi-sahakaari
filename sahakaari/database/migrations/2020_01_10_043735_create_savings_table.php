<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSavingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('savings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('share_no')->foreign('share_no')->references('no')->on('shares');
            $table->string("acc_type")->charset('utf8')->collation('utf8_unicode_ci');
            $table->decimal('money', 12,5);
            $table->mediumInteger('interest');
            $table->unsignedBigInteger('acc_no')->nullable();
            $table->text('description')->charset('utf8')->collation('utf8_unicode_ci')->nullable();
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
        Schema::dropIfExists('savings');
    }
}
