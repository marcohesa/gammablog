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
            'name' => 'Ver categorias',
        ]);
        Permission::create([
            'name' => 'Crear categorias',
        ]);
        Permission::create([
            'name' => 'Editar categorias',
        ]);
        Permission::create([
            'name' => 'Eliminar categorias',
        ]);

        Permission::create([
            'name' => 'Ver publicaciones',
        ]);
        Permission::create([
            'name' => 'Crear publicaciones',
        ]);
        Permission::create([
            'name' => 'Editar publicaciones',
        ]);
        Permission::create([
            'name' => 'Eliminar publicaciones',
        ]);


        Permission::create([
            'name' => 'dashboard',
        ]);


        Permission::create([
            'name' => 'Ver roles',
        ]);
        Permission::create([
            'name' => 'Crear roles',
        ]);
        Permission::create([
            'name' => 'Editar roles',
        ]);
        Permission::create([
            'name' => 'Eliminar roles',
        ]);


        Permission::create([
            'name' => 'Ver usuarios',
        ]);
        Permission::create([
            'name' => 'Crear usuarios',
        ]);
        Permission::create([
            'name' => 'Editar usuarios',
        ]);
        Permission::create([
            'name' => 'Eliminar usuarios',
        ]);
    }
}
