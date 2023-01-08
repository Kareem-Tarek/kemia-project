<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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
            'name'       => 'Mohamed Samy',
            'email'      => 'samy@app.com',
            'password'   => bcrypt('123456'),
            'roles_name' => 'admin',
            'mobile'     => "01150100104",
        ]);

        $user = User::create([
            'name'       => 'Ahmed Khalifa',
            'email'      => 'khalifa@app.com',
            'password'   => bcrypt('123456'),
            'roles_name' => 'admin',
            'mobile'     => "01112554996",
        ]);

        $user = User::create([
            'name'       => 'Kareem DEV',
            'email'      => 'kareemtarekpk@gmail.com',
            'password'   => bcrypt('123456'),
            'roles_name' => 'admin',
            'mobile'     => "01010110457",
        ]);

        $role = Role::create(['name' => 'admin']);
        $permissions = Permission::pluck('id', 'id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    }
}
