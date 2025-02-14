<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;
use App\Models\User;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Task::create([
            'name' => 'other one',
            'description' => 'This is oder task .',
            'status' => 'pendiente',
            'admin_id' => 1,  
            'project_id'=>1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
    }
}
