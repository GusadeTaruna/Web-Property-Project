<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('land_list', function (Blueprint $table) {
            $table->id();
            $table->string('land_code');
            $table->string('land_name');
            $table->string('land_location');
            $table->string('land_status');
            $table->string('price');
            $table->boolean('site_plan');
            $table->string('site_dimensions');
            $table->string('site_area');
            $table->enum('pdma_water', ['well', 'bor','no']);
            $table->string('power_kv');
            $table->boolean('imb');
            $table->string('school_distance');
            $table->string('hospital_distance');
            $table->string('airport_distance');
            $table->string('supermarket_distance');
            $table->string('beach_distance');
            $table->string('fine_dining_distance');
            $table->text('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('land_list');
    }
}
