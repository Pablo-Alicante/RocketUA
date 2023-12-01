<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        // Borramos los datos de la tabla
        DB::table('users')->delete();

        // Añadimos una entrada a esta tabla
        DB::table('users')->insert([
            'name' => 'Ejemplo',
            'email' => 'ejemplo@domain.com',
            'password' => 'strongpassword']);
    }
}
