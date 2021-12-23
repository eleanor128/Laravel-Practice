<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'view any articles']);
        Permission::create(['name' => 'view articles']);
        Permission::create(['name' => 'view destroyed articles']);
        Permission::create(['name' => 'create articles']);
        Permission::create(['name' => 'update articles']);
        Permission::create(['name' => 'delete articles']);
        Permission::create(['name' => 'restore articles']);
        Permission::create(['name' => 'enroll articles ']);
        Permission::create(['name' => 'view articles liked readers']);



        $role = Role::create(['name' => 'admin']);
        $role->syncPermissions([
            'view any articles',
            'view articles',
            'view destroyed articles',
            'restore articles',
            'view articles liked readers'
        ]);

        $role = Role::create(['name' => 'author']);
        $role->syncPermissions([
            'view any articles',
            'view articles',
            'create articles',
            'update articles',
            'delete articles',
            'view articles liked readers'
        ]);


        $role = Role::create(['name' => 'reader']);
        $role->syncPermissions([
            'view any articles',
            'view articles',
            'enroll articles '
        ]);
    }
}
