<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Marco Antonio Hernandez Salas',
            'email' => 'marc0.4ntonio.1996@gmail.com',
            'institution_id' => 2,
            'description' => 'Ing. en sistemas comnputacionales, especializado en ing. de software y desarrollador fullstack.',
            'estudies' => 'Ing. en sistemas comnputacionales, especializado en ing. de software y desarrollador fullstack.',
            'password' => bcrypt('12345678'),
        ]);
        User::factory(19)->create();
    }
}
