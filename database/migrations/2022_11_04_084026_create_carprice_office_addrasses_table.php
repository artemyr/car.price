<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarpriceOfficeAddrassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carprice_office_addrasses', function (Blueprint $table) {
            $table->id();

            $table->string('city');
            $table->string('address');
            $table->string('phone');
            $table->string('work_time');
            $table->string('coords');

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
        Schema::dropIfExists('carprice_office_addrasses');
    }
}
