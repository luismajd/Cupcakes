<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Administrador01',
            'email' => 'lpck@outlook.com',
            'password' => '$2y$10$9zwSAbDSwVEx4OwqZlY29uHEIFHrdlMoClvgGmlkhTRSYWdgT32Tq',
            'tel' => '3301234567',
            'clase' => 'Admin'
        ]);
    }
}
