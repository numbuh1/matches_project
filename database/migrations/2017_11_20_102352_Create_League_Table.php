<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeagueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leagues', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('gameType');
            $table->text('description')->nullable();
            $table->string('country');
            $table->string('countryId');
            $table->string('location')->nullable();
            $table->string('logo')->nullable();
            $table->string('image')->nullable();
            $table->string('banner')->nullable();
            $table->date('dateStart')->nullable();
            $table->date('dateEnd')->nullable();
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
        Schema::dropIfExists('leagues');
    }
}
