<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();   
        $this->call(PermissionTableSeeder::class);
        $this->call(CollegeSeeder::class);
        $this->call(DeptSeeder::class);
        $this->call(JobSeeder::class);
        $this->call(SpecialtySeeder::class);
        $this->call(DegreeSeeder::class);
        $this->call(CreateUserSeeder::class);
        $this->call(VacationSeeder::class);
        $this->call(BonusSeeder::class);
    }
}
