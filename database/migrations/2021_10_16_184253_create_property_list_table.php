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
            $table->string('property_code')->nullable();
            $table->string('property_name')->nullable();
            $table->string('property_location')->nullable();
            $table->string('property_status')->nullable();
            $table->string('property_image')->nullable();
            $table->string('currency')->nullable();
            $table->double('price')->nullable();
            $table->double('price_usd')->nullable();
            $table->text('description')->nullable();
            $table->text('video_link')->nullable();
            $table->string('site_area')->nullable();
            $table->string('site_dimension')->nullable();
            $table->string('building_area')->nullable();
            $table->boolean('site_plan')->nullable();
            $table->enum('pdma_water', ['Well', 'Bor','No'])->nullable();
            $table->boolean('imb')->nullable();
            $table->integer('power_kv')->nullable();
            $table->integer('generator_kv')->nullable();
            $table->unsignedBigInteger('zoning')->nullable();
            $table->foreign('zoning')->references('id')->on('zoning_type');
            $table->integer('bed_qty')->nullable();
            $table->integer('bath_qty')->nullable();
            $table->integer('garage_qty')->nullable();
            $table->integer('school_distance')->nullable();
            $table->integer('hospital_distance')->nullable();
            $table->integer('airport_distance')->nullable();
            $table->integer('supermarket_distance')->nullable();
            $table->integer('beach_distance')->nullable();
            $table->integer('fine_dining_distance')->nullable();
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
            $table->bigInteger('view_count')->nullable();
            $table->string('data_status')->nullable();
            $table->date('year_built')->nullable();
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
