<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEpisodeLanguage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('episode_language', function (Blueprint $table) {
            $table->unsignedBigInteger('episode_id');
            $table->foreign('episode_id')
                    ->references('id')->on('episodes');
            $table->unsignedBigInteger('language_id');
            $table->foreign('language_id')
                    ->references('id')->on('languages');
            $table->enum('type', ['audio', 'subtitle']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('episode_language');
    }
}
