<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemplateElementAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('template_element_attributes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('element_id');
            $table->string('name');
            $table->string('label');
            $table->enum('configuration', ['auto', 'manual']);
            $table->string('target');
            $table->enum('returned_type', ['Collection', 'Array', 'String', 'Number']);
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
        Schema::dropIfExists('template_element_attributes');
    }
}
