<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Task;
use App\Models\User;
use App\Models\Project;

class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition(): array
    {
        return [
            'admin_id' => User::where('role', 'admin')->inRandomOrder()->value('id') ?? User::factory(),
            'name' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'status' => $this->faker->randomElement(['pendiente', 'en proceso', 'completada']),
            'project_id' => Project::inRandomOrder()->value('id') ?? Project::factory(),
        ];
    }
}
