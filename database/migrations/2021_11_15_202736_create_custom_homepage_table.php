<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomHomepageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_homepage', function (Blueprint $table) {
            $table->id();
            $table->string('header_title')->nullable();
            $table->string('header_sub_title')->nullable();
            $table->string('header_image')->nullable();
            $table->string('left_section_title')->nullable();
            $table->string('left_section_sub_title')->nullable();
            $table->string('left_section_image_or_vid')->nullable();
            $table->string('right_section_title')->nullable();
            $table->string('right_section_sub_title')->nullable();
            $table->string('right_section_image_or_vid')->nullable();
            $table->string('center_section_text')->nullable();
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
        Schema::dropIfExists('custom_homepage');
    }
}
