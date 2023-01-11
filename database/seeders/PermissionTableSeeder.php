<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;


class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'user-restore',
            'user-forceDelete',

            'role-list',
            'role-create',
            'role-edit',
            'role-delete',

            'category-list',
            'category-create',
            'category-edit',
            'category-delete',
            'category-restore',
            'category-forceDelete',

            'product-list',
            'product-create',
            'product-edit',
            'product-delete',
            'product-restore',
            'product-forceDelete',

            'setting-list',
            'setting-create',
            'setting-edit',
            'setting-delete',
            'setting-restore',
            'setting-forceDelete',

        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
