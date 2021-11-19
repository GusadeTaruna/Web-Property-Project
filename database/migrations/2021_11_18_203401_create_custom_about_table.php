<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomAboutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_about', function (Blueprint $table) {
            $table->id();
            $table->string('team_title')->nullable();
            $table->text('team_desc')->nullable();
            $table->string('team_img')->nullable();
            $table->string('mission_title')->nullable();
            $table->text('mission_desc')->nullable();
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
        Schema::dropIfExists('custom_about');
    }
}
