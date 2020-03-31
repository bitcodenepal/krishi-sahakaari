<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHarvestersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('harvesters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')->on('users');
            $table->string('name')->charset('utf8')->collation('utf8_unicode_ci');
            $table->string('address')->charset('utf8')->collation('utf8_unicode_ci');
            $table->bigInteger('contact_no');
            $table->string('use_address')->charset('utf8')->collation('utf8_unicode_ci');
            $table->string('use_date');
            $table->bigInteger('amount');
            $table->string('description')->charset('utf8')->collation('utf8_unicode_ci')->nullable();
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
        Schema::dropIfExists('harvesters');
    }
}
