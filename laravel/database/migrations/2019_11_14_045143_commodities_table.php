<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CommoditiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commodities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')
                  ->unsigned();
            $table->string('name');
            $table->integer('price');
            $table->integer('status')
                  ->default(0);
            $table->text('image_path')
                  ->nullable()
                  ->default(null);
            $table->text('description')
                  ->nullable()
                  ->default(null);
            $table->boolean('is_dealings')
                  ->default(false);


            $table->timestamps();

            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('commodities');
    }
}
