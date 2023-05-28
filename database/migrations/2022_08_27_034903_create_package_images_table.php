<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_images', function (Blueprint $table) {
            $table->id();
            $table->boolean('thumbnail');
            $table->string('image_url', 255)->nullable();
            $table->string('package_id')->nullable();
            // remove foreign key check, because package data store might fail
            // $table->foreign('package_id')->references('id')->on('packages');
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
        Schema::dropIfExists('package_images');
    }
}
