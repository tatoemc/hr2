<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vacation;

class VacationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Vacation = [
           
            ['name' => 'سنوية'],
            ['name' => 'بدون مرتب'],
            ['name' => 'رضاعة'],
            ['name' => 'وضوع'],
           
        ];
            foreach ($Vacation as $key => $value) {

                Vacation::create($value);
    
            }
    }
}
