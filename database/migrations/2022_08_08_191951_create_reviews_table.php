<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('city_id')->nullable();

            $table->string('title');
            $table->string('link');
            $table->string('preview_image')->nullable();
            $table->text('content');

            $table->string('author');
            $table->string('cr_date');
            $table->unsignedTinyInteger('rate');
            $table->string('author_ava');

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
        Schema::dropIfExists('reviews');
    }
}
