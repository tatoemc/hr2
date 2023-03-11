<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\College;

class CollegeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $college = [
           
            ['name' => 'علوم حاسوب'],
            ['name' => 'كلية تجارة'],
            ['name' => 'كلية هندسة'],
            ['name' => 'كلية مصارف'],
           
        ];
            foreach ($college as $key => $value) {

                College::create($value);
    
            }
    }


}
