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
        Schema::create('event_classes', function (Blueprint $table) {
            $table->id();

            $table->json('name');
            $table->json('subtitle');
            $table->json('text');
            $table->json('dates');
            $table->boolean('is_payable')->nullable();
            $table->boolean('is_free')->nullable();

            $table->foreignId('event_id')
                ->constrained()
                ->on('events')
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
        Schema::dropIfExists('event_classes');
    }
};
