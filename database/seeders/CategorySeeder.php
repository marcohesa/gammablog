<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Articulo',
            'slug' => 'articulo',
        ]);
        Category::create([
            'name' => 'Noticia',
            'slug' => 'noticia',
        ]);
        Category::create([
            'name' => 'Efeméride',
            'slug' => 'efemeride',
        ]);
    }
}
