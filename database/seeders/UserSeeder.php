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
            'identification' => '123456789',
            'email' => 'usuarioprueba@gmail.com',
        ], [
            'uuid' => Uuid::uuid1() . Uuid::uuid4(),
            'first_name' => 'Usuario',
            'middle_name' => 'de',
            'first_surname' => 'prueba',
            'second_surname' => 'adp',
            'identification' => '123456789',
            'state' => 'activo',
            'email' => 'usuarioprueba@gmail.com',
            'password' => bcrypt('123abc'),
        ]);
    }
}
