<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Job;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Job = [
           
            ['name' => 'عميد'],
            ['name' => 'وكيل'],
            ['name' => 'المدير المالي'],
            ['name' => 'محاضر'],
            ['name' => 'مساعد تدريس'],
            ['name' => 'رئيس قسم'],
            ['name' => 'موظف'],
            ['name' => 'متدرب'],
            
           
        ];
            foreach ($Job as $key => $value) {

                Job::create($value);
    
            }
    }
}
