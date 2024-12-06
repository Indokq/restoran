<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('category', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::table('menu', function (Blueprint $table){
            $table->dropColumn('category_menu');
            $table->foreignId('id_category')->references('id')->on('category');
        });
    }

    public function down()
    {
        Schema::dropIfExists('category');
    }
}

