<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateModeratorUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'       => 'Micheal Adams',
            'email'      => 'moderator1@app.com',
            'password'   => bcrypt('123456'),
            'status'     => 'inactive',
            'roles_name' => 'moderator',
        ]);

        $user = User::create([
            'name'       => 'Jennifer Andy',
            'email'      => 'andy@app.com',
            'password'   => bcrypt('123456'),
            'status'     => 'block',
            'roles_name' => 'moderator',
        ]);

        $user = User::create([
            'name'       => 'Lara Croft',
            'email'      => 'croft@app.com',
            'password'   => bcrypt('123456'),
            'roles_name' => 'moderator',
        ]);

        $role = Role::create(['name' => 'moderator']);
        $permissions = Permission::pluck('id', 'id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    }
}
