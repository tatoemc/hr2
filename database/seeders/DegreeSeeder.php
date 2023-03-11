<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Degree;

class DegreeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Degree = [
           
            ['name' => 'الاولى'],
            ['name' => 'الثانية'],
            ['name' => 'الثالثة'],
            ['name' => 'الرابعة'],
            ['name' => 'الخامسة'],
            ['name' => 'السادسة'],
            ['name' => 'السابعة'],
            ['name' => 'الثامنة'],
            ['name' => 'التاسعة'],
            ['name' => 'العاشرة'],
            ['name' => '11'],
            ['name' => '12'],
            ['name' => '13'],
            ['name' => '14'],
            ['name' => '15'],
            ['name' => '16'],
            ['name' => '17'],
            ['name' => 'محاضر'],
            ['name' => 'مساعد تدريس'],
            ['name' => 'متدرب'],
           
        ];
            foreach ($Degree as $key => $value) {

                Degree::create($value);
    
            }
    }
}
