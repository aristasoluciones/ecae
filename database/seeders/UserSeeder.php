<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            'name' => 'superadministrador',
            'email' => 'superadministrador',
            'password' => Hash::make('Democracia2024'),
        ]);

        User::create([
            'name' => 'Administrador',
            'email' => 'registros-selycael2024@iepc-chiapas.org.mx',
            'password' => Hash::make('Democracia2024'),
        ]);
    }
}
