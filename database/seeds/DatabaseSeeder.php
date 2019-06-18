<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(StaffSeeder::class);
        $this->call(BachelorSeeder::class);
         $this->call(ChildSeeder::class);
         $this->call(DoctorSeeder::class);
         $this->call(FatherSeeder::class);
         $this->call(MasterSeeder::class);
         $this->call(MotherSeeder::class);
         $this->call(SpouseSeeder::class);
    }
}
