<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('houses', function (Blueprint $table) {
            $table->string('city')->after('price')->nullable();
            $table->string('district')->after('price')->nullable();
            $table->string('road')->after('price')->nullable();
            $table->string('address')->after('price')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('houses', function (Blueprint $table) {
            $table->dropColumn('city');
            $table->dropColumn('district');
            $table->dropColumn('road');
            $table->dropColumn('address');
        });
    }
}
