<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->text('title')->nullable();
            $table->text('description')->nullable();                     
            $table->string('email')->nullable();   
            $table->string('favicon')->nullable(); 
            $table->string('logo')->nullable();    
            $table->string('facebook')->nullable();                         
            $table->string('twitter')->nullable(); 
            $table->string('instagram')->nullable();                         
            $table->string('whatsapp')->nullable();
            $table->string('primary_color')->nullable();
            $table->tinyInteger('is_facebook_pixel')->default(1)->nullable();
            $table->string('facebook_pixel')->nullable();
            $table->tinyInteger('is_adsense')->default(1)->nullable();
            $table->string('google_adsense')->nullable();
            $table->tinyInteger('is_analytics')->default(1)->nullable();
            $table->string('google_analytics_id')->nullable();
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
};
