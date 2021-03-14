<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
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
        Permission::create([
            'name' => 'categories.index',
        ]);
        Permission::create([
            'name' => 'categories.create',
        ]);
        Permission::create([
            'name' => 'categories.edit',
        ]);
        Permission::create([
            'name' => 'categories.delete',
        ]);

        Permission::create([
            'name' => 'posts.index',
        ]);
        Permission::create([
            'name' => 'posts.create',
        ]);
        Permission::create([
            'name' => 'posts.edit',
        ]);
        Permission::create([
            'name' => 'posts.delete',
        ]);


        Permission::create([
            'name' => 'dashboard',
        ]);


        Permission::create([
            'name' => 'roles.index',
        ]);
        Permission::create([
            'name' => 'roles.create',
        ]);
        Permission::create([
            'name' => 'roles.edit',
        ]);
        Permission::create([
            'name' => 'roles.delete',
        ]);


        Permission::create([
            'name' => 'users.index',
        ]);
        Permission::create([
            'name' => 'users.create',
        ]);
        Permission::create([
            'name' => 'users.edit',
        ]);
        Permission::create([
            'name' => 'users.delete',
        ]);
    }
}
