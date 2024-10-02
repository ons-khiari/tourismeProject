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
        Schema::create('guides_locaux', function (Blueprint $table) {
            $table->id('id');
            $table->string('nom');
            $table->text('description')->nullable();
            $table->string('region')->nullable();
            $table->string('ville')->nullable();
            $table->string('type_tours')->nullable();
            $table->string('disponibilites')->nullable();
            $table->integer('experience_annees')->nullable();
            $table->string('langues_parlees')->nullable();
            $table->string('telephone', 20)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('site_web')->nullable();
            $table->boolean('certification')->default(false);
            $table->boolean('tour_groupe')->default(false);
            $table->boolean('tour_prive')->default(false);
            $table->text('commentaires')->nullable();
            $table->string('photo_url')->nullable();
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
        Schema::dropIfExists('guides_locaux');
    }
};