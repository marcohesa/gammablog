<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Institution;

class InstitutionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Institution::create([
            'name' => 'CONABIO',
        ]);
        Institution::create([
            'name' => 'INECOL',
        ]);
        Institution::create([
            'name' => 'CIATEC',
        ]);
        Institution::create([
            'name' => 'CIDE',
        ]);
        Institution::create([
            'name' => 'UNIVERSIDAD DE LUXEMBURGO, RISC',
        ]);
        Institution::create([
            'name' => 'UPIITA - IPN',
        ]);
    }
}
