<?php

namespace Database\Seeders;

use App\Models\ModelHasRole;
use Illuminate\Database\Seeder;

class ModelHasRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelHasRole::create([
            'role_id' => '1',
            'model_type' => 'App\Models\User',
            'model_id' => '1',
        ]);
    }
}
