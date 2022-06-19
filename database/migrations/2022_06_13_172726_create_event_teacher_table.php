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
        Schema::create('event_teacher', function (Blueprint $table) {
            $table->foreignId('event_id')
                ->constrained()
                ->on('events')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('teacher_id')
                ->constrained()
                ->on('teachers')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_teacher');
    }
};
