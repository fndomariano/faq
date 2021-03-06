<?php 

$factory->define(\App\FAQ::class, function(Faker\Generator $faker){
    return [
		'reference'   => $faker->unique()->isbn10,
		'useful'      => rand(1, 10),
		'useless'     => rand(1, 10),
        'question'    => $faker->text(180),
        'answer'      => $faker->realText(180),
        'created_by'  => rand(1, 10)
    ];
});