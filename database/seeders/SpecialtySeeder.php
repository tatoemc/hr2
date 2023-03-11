<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Specialty;

class SpecialtySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Specialty = [
           
            ['name' => 'محاسبة'],
            ['name' => 'أدارة'],
            ['name' => 'موارد بشرية'],
            ['name' => 'تقنية معلومات'],
            ['name' => 'علوم حاسوب'],
            ['name' => 'هندسة تحكم'],
            
           
        ];
            foreach ($Specialty as $key => $value) {

                Specialty::create($value);
    
            }
    }
}
