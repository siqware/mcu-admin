<?php

use Illuminate\Database\Seeder;

class BachelorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Bachelor::class,1)->create();
    }
}
