<?php

// Подключим автозагрузку классов
require 'vendor/autoload.php';

// Объявим неймспейсы
use Faker\Factory as Faker;
use Messages\Models;

// Запишем экземпляр класса Faker\Factory в переменную
$faker = Faker::create('ru_RU');


for($i=0;$i<200;$i++) {

    $text = $faker->realText(2000);
    $short_text = substr($text,0,200);

    $data = new stdClass();
    $data->user_id=$faker->numberBetween(1, 3);
    $data->title=$faker->text(100);
    $data->summary_content=$short_text;
    $data->full_content=$text;

    $model = new Models\MessagesModel();
    $model->createMessage($data);

}


