<?php

use Illuminate\Database\Seeder;

class FAQTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        factory(\App\FAQ::class, 50)->create();
    }
}