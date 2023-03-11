<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BromotionSeeder extends Seeder
{
    
    public function run()
    {
        $college = [
           
            ['user_id' => '1'],
            ['date' => ' '],
            
           
        ];
            foreach ($college as $key => $value) {

                College::create($value);
    
            }
    }
}
