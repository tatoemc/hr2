<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bonus;

class BonusSeeder extends Seeder 
{
    public function run()
    {
        $Bonus = [
           
            ['name' => 'سفر','amount'=> '6000'],
            ['name' => 'سيارة','amount'=> '4000'],
            ['name' => 'انترنت','amount'=> '3000'],
            ['name' => 'كتب','amount'=> '3000'],
        ];
            foreach ($Bonus as $key => $value) {

                Bonus::create($value);
    
            }
    }
}
