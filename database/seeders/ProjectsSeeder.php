<?php

namespace Database\Seeders;


use Illuminate\Container\Attributes\Database;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
DB::table('projects')->insert([
    [
        'name' => 'Project Alpha',
        'admin_id' => 1,
        'description' => 'Description for Project Alpha',
        'created_at' => now(),
        'updated_at' => now(),
    ],
    
]);
    }
}
