<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateAdminUserSeeder extends Seeder
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
            'password' => Hash::make('admin123'),
            'company_id' => 1,
        ]);
    
        $role = Role::create(['name' => 'admin']);//roles
     
        $permissions = Permission::pluck('id','id')->all();//get all permission
   
        $role->syncPermissions($permissions);
     
        $user->assignRole([$role->id]);
    }
}
