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
            'name' => 'Ronaldo rodriguez',
            'email' => 'ranaldo@gmail.com',
            'institution_id' => 2,
            'description' => 'Ing. en sistemas comnputacionales, especializado en ing. de software y desarrollador fullstack.',
            'estudies' => 'Ing. en sistemas comnputacionales, especializado en ing. de software y desarrollador fullstack.',
            'password' => bcrypt('12345678'),
        ]);
        User::factory(19)->create();
    }
}
