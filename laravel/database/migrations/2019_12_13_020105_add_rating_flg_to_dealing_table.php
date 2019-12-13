<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRatingFlgToDealingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dealings', function (Blueprint $table) {
            $table->boolean('rating_admin')->default(false)->nullable()->after('status');
            $table->boolean('rating_user')->default(false)->nullable()->after('rating_admin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dealings', function (Blueprint $table) {
            $table->dropColumn('rating_admin');
            $table->dropColumn('rating_user');
        });
    }
}
