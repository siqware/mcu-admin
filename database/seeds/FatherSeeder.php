<?php

use Illuminate\Database\Seeder;

class FatherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Father::class,1)->create();
    }
}
