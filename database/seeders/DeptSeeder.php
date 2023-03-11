<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dept;

class DeptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dept = [
           
            ['name' => 'هندسة تحكم','college_id'=>'3'],
            ['name' => 'هندسة طبية','college_id'=>'3'],
            ['name' => 'هندسة مدنية','college_id'=>'3'],
            ['name' => 'كلية مصارف','college_id'=>'4'],
           
        ];
            foreach ($dept as $key => $value) {

                Dept::create($value);
    
            }
    }
}
