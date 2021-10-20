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
            $table->string('property_type');
            $table->string('property_code');
            $table->string('property_name');
            $table->string('property_location');
            $table->string('property_status');
            $table->string('price');
            $table->string('site_area');
            $table->string('site_dimension')->nullable();
            $table->string('building_area')->nullable();
            $table->boolean('site_plan');
            $table->enum('pdma_water', ['Well', 'Bor','No']);
            $table->boolean('imb');
            $table->string('power_kv');
            $table->string('generator_kv')->nullable();
            $table->unsignedBigInteger('zoning');
            $table->foreign('zoning')->references('id')->on('zoning_type');
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
        Schema::dropIfExists('property_list');
    }
}
