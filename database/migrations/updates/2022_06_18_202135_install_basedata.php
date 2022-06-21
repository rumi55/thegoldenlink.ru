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

        \App\Models\CustomBlock::create([
            'name' => [
                'ru' => 'Блок в шапке на главной',
                'en' => 'Header block',
            ],
            'text' => [
                'ru' => 'Онлайн классы и живые мероприятия  по всей России с Учителями мирового уровня — <nobr>Хари Сингх</nobr> и <nobr>Хари Нам Каур.</nobr>',
                'en' => 'Online classes and live events across Russia with world-class teachers <nobr>Hari Singh</nobr> and <nobr>Hari Nam Kaur.</nobr>',
            ],
            'type' => 'header',
        ]);

        \App\Models\CustomBlock::create([
            'name' => [
                'ru' => 'лет опыта',
                'en' => 'years of experience',
            ],
            'text' => [
                'ru' => '30',
                'en' => '30',
            ],
            'type' => 'statistic_1',
        ]);

        \App\Models\CustomBlock::create([
            'name' => [
                'ru' => 'лет преподавания',
                'en' => 'years of teaching',
            ],
            'text' => [
                'ru' => '25',
                'en' => '25',
            ],
            'type' => 'statistic_2',
        ]);

        \App\Models\CustomBlock::create([
            'name' => [
                'ru' => 'учеников в год',
                'en' => 'students per year',
            ],
            'text' => [
                'ru' => '1000',
                'en' => '1000',
            ],
            'type' => 'statistic_3',
        ]);

        \App\Models\CustomBlock::create([
            'name' => [
                'ru' => 'стран преподавания',
                'en' => 'teaching countries',
            ],
            'text' => [
                'ru' => '7',
                'en' => '7',
            ],
            'type' => 'statistic_4',
        ]);

        \App\Models\CustomBlock::create([
            'name' => [
                'ru' => 'онлайнов в год',
                'en' => 'online per year',
            ],
            'text' => [
                'ru' => '70+',
                'en' => '70+',
            ],
            'type' => 'statistic_5',
        ]);

        $teachers = \App\Models\CustomBlock::create([
            'name' => [
                'ru' => 'УЧИТЕЛЯ ШКОЛЫ',
                'en' => 'TEACHERS',
            ],
            'text' => [
                'ru' => '<h3 class="subtitle teachers__title">
                        Хари Нам Каур и Хари Сингх
                    </h3>

                    <p>
                        Одни из сильнейших Учителей Кундалини йоги, медитации
                        и Сат Нам Расаян мирового уровня с опытом практики <b>более 30 лет</b>.
                    </p>

                    <p>
                        Они долгие годы <b>напрямую обучались у Мастера Кундалини йоги Йоги Бхаджана и Мастера Сат Нам
                            Расаян Гуру Дев Сингх</b>,
                        получая от них бесценные опыт и знания.
                    </p>

                    <p>
                        Они в числе немногих обучались у Гуру Дев Сингх сидеть
                        <b>и держать пространство Кундалини Сурджи Джапы</b>
                        и каждый год приезжают на Джапу с Мастером.
                    </p>

                    <p>
                        Хари Сингх и Хари Нам Каур преподают Кундалини йогу,
                        медитации и Сат Нам Расаян <b>по всему миру, собирая сотни
                            людей</b> из разных стран регулярно практиковать вживую и онлайн.
                    </p>

                    <a href="/teachers" class="teachers__btn btn btn--outline">
                        Подробнее
                    </a>',
                'en' => '<h3 class="subtitle teachers__title">
                        Hari Nam Kaur and Hari Singh
                    </h3>

                    <p>
                        One of the strongest teachers of Kundalini yoga, meditation
                        and world-class Sat Nam Rasayan with <b>over 30 years</b> practice experience.
                    </p>

                    <p>
                        They have been studying directly with Kundalini Yoga Master Yogi Bhajan and Master Sat Nam for many years.
                            Rasayan Guru Dev Singh</b>,
                        gaining invaluable experience and knowledge from them.
                    </p>

                    <p>
                        They are among the few who have been taught by Guru Dev Singh to sit
                        <b>and keep the space of Kundalini Surji Japa</b>
                        and every year they come to Japa with the Master.
                    </p>

                    <p>
                        Hari Singh and Hari Nam Kaur teach Kundalini yoga,
                        meditation and Sat Nam Rasayan <b>around the world, gathering hundreds
                            people</b> from different countries to regularly practice live and online.
                    </p>

                    <a href="/teachers" class="teachers__btn btn btn--outline">
                        More
                    </a>',
            ],
            'type' => 'teachers',
        ]);

        copy(resource_path('images/content/Teachers.jpg'), resource_path('images/content/TeachersUpload.jpg'));
        $teachers->addMedia(resource_path('images/content/TeachersUpload.jpg'))
            ->toMediaCollection(\App\Models\CustomBlock::COLLECTION);
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
