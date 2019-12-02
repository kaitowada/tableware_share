<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DealingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dealings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->unsignedBigInteger('commodity_id')->unsigned();
            $table->integer('status')->nullable()->default(null);

            $table->timestamps();

            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('commodity_id')->references('id')->on('commodities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dealings');
    }
}
