<?php

namespace Database\Seeders;


use Illuminate\Container\Attributes\Database;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('users')->insert([
            'name' => 'Anouar Mais saydi ',
        'email' => 'a@m.es',
        'email_verified_at' => now(), 
        'password' => Hash::make('12345678'),
        'role' => 'admin', 
        'remember_token' => Str::random(10), 

        ]);
    }
}
