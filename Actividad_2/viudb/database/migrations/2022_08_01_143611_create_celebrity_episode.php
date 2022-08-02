<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCelebrityEpisode extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('celebrity_episode', function (Blueprint $table) {
            $table->unsignedBigInteger('celebrity_id');
            $table->foreign('celebrity_id')
                    ->references('id')->on('celebrities');
            $table->unsignedBigInteger('episode_id');
            $table->foreign('episode_id')
                    ->references('id')->on('episodes');
            $table->enum('perform_as', ['director', 'actor']);
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
        Schema::dropIfExists('celebrity_episode');
    }
}
