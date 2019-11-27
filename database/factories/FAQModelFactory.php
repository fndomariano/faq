<?php 

$factory->define(\App\FAQ::class, function(Faker\Generator $faker){
    return [
        'question' => $faker->text(180),
        'answer'   => $faker->realText(180),
        'user_id'  => 1
    ];
});