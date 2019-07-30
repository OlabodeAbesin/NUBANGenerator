<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNubansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nubans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('lastUsedSerial')->default(110000000);//Our serial numbers starts at this numbers(Hardcoded at 110000000)
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
        Schema::dropIfExists('nubans');
    }
}
