<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Company;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Admin', 
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'user_type' => 'admin',
            'phone' => '0911405218',
            'job_id' => '1',
            'degree_id' => '1',
            'specialty_id' => '1',
            'salary' => '2',
            'gender' => 'ذكر',
            'address' => 'الخرطوم',
            'roles_name' => ["مدير الموارد البشرية"],
            'images' => 'default.png',
            ]);
            
            $role = Role::create(['name' => 'مدير الموارد البشرية']);

           
            $permissions = Permission::pluck('id','id')->all();
            
            $role->syncPermissions($permissions);
            
            $user->assignRole([$role->id]);

    }
}
