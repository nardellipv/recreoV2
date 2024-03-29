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
        $this->call(ProvinceSeeder::class);
        $this->call(RegionSeeder::class);
        //comment
        $this->call(UserSeeder::class);
        $this->call(TeacherSeeder::class);
        $this->call(StudentSeeder::class);
        //--------------
        $this->call(ButtonSeeder::class);
    }
}
