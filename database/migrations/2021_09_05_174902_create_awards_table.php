<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAwardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('awards', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->tinyInteger('delivery_in_time');
            $table-> date('time_open')->nullable();
            $table->bigInteger('number')->nullable();
            $table->bigInteger('number_left')->default(0)->nullable();
            $table->integer('discount_code')->default(0);
            $table->integer('cash_prize');
            $table->string('type');
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
        Schema::dropIfExists('awards');
    }
}
