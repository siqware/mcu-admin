<?php

use Illuminate\Database\Seeder;

class MotherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Mother::class,1)->create();
    }
}
