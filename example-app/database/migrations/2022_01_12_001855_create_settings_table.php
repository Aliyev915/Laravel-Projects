<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('header_image',100);
            $table->string('header_title',25);
            $table->string('header_text',50);
            $table->string('about_text_1',200);
            $table->string('about_text_2',200);
            $table->string('address',100);
            $table->string('footer_about',50);
            $table->string('copyright',100);
            $table->string('facebook',200);
            $table->string('twitter',200);
            $table->string('linkedin',200);
            $table->string('dribbble',200);
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
        Schema::dropIfExists('settings');
    }
}
