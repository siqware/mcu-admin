<?php

use Illuminate\Database\Seeder;

class SpouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Spouse::class,1)->create();
    }
}
