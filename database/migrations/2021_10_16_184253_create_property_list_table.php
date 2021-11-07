<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_list', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('property_type');
            $table->foreign('property_type')->references('id')->on('property_type');
            $table->string('property_code');
            $table->string('property_name');
            $table->string('property_location');
            $table->string('property_status');
            $table->string('property_image');
            $table->string('price');
            $table->text('description');
            $table->text('video_link')->nullable();
            $table->string('site_area');
            $table->string('site_dimension')->nullable();
            $table->string('building_area')->nullable();
            $table->boolean('site_plan');
            $table->enum('pdma_water', ['Well', 'Bor','No']);
            $table->boolean('imb');
            $table->integer('power_kv');
            $table->integer('generator_kv')->nullable();
            $table->unsignedBigInteger('zoning');
            $table->foreign('zoning')->references('id')->on('zoning_type');
            $table->integer('bed_qty');
            $table->integer('bath_qty');
            $table->integer('garage_qty');
            $table->integer('school_distance');
            $table->integer('hospital_distance');
            $table->integer('airport_distance');
            $table->integer('supermarket_distance');
            $table->integer('beach_distance');
            $table->integer('fine_dining_distance');
            //additional land
            $table->boolean('topography_plan')->nullable();
            $table->boolean('soil_test')->nullable();
            $table->string('slope_ratio')->nullable();
            $table->string('building_ratio')->nullable();
            $table->string('rain_avg_year')->nullable();
            $table->string('humidity_avg_year')->nullable();
            $table->string('city_draw')->nullable();
            $table->boolean('access_road')->nullable();
            $table->string('access_road_width')->nullable();
            $table->text('surrounding_sites_desc')->nullable();
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
        Schema::dropIfExists('property_list');
    }
}
