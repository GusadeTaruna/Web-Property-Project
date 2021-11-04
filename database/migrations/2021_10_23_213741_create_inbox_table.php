<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInboxTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inbox', function (Blueprint $table) {
            $table->id();
            $table->enum('msg_type', ['contact', 'inquiry']);
            $table->string('sender_name');
            $table->string('sender_email');
            $table->string('phone')->nullable();
            $table->string('country')->nullable();
            $table->text('inquiry_list')->nullable();
            $table->text('message');
            $table->boolean('status_msg_seen')->nullable();
            $table->boolean('status_msg_respon')->nullable();
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
        Schema::dropIfExists('inbox');
    }
}
