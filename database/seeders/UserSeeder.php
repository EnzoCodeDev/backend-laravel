<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::updateOrCreate([
            'name' => 'User admin',
            'email' => 'usuarioprueba@gmail.com'
        ], [
            'name' => 'User admin',
            'email' => 'usuarioprueba@gmail.com',
            'password' => bcrypt('123abc'),
        ]);
    }
}
