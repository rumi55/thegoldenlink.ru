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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->json('title');
            $table->json('subtitle')->nullable();
            // @todo возможно удалить
            $table->json('dates')->nullable();
            $table->json('text_preview')->nullable();
            $table->boolean('is_hot')->nullable();
            $table->boolean('is_published')->nullable();
            $table->json('views')->nullable();
            $table->unsignedInteger('order')->default(500);

            $table->foreignId('venue_id')
                ->nullable()
                ->constrained()
                ->on('venues')
                ->onUpdate('cascade')
                ->onDelete('cascade');

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
        Schema::dropIfExists('events');
    }
};
