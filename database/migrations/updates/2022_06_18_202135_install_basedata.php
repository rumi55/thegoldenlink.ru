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
        \App\Models\City::create([
            'name' => [
                'ru' => 'Москва',
                'en' => 'Moscow',
            ],
        ]);

        \App\Models\City::create([
            'name' => [
                'ru' => 'Санкт-Петербург',
                'en' => 'St. Petersburg',
            ],
        ]);

        \App\Models\Tag::create([
            'name' => [
                'ru' => 'Онлайн',
                'en' => 'Online',
            ]
        ]);

        \App\Models\Tag::create([
            'name' => [
                'ru' => 'В живую',
                'en' => 'Offline',
            ]
        ]);

        \App\Models\Teacher::create([
            'name' => [
                'ru' => 'Хари Сингх',
                'en' => 'Hari Singh',
            ],
        ]);

        \App\Models\Teacher::create([
            'name' => [
                'ru' => 'Хари Нам Каур',
                'en' => 'Hari Nam Kaur',
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
