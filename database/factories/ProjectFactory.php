<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Project;
use App\Models\User;

class ProjectFactory extends Factory
{
    protected $model = Project::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(3),
            'admin_id' => User::where('role', 'admin')->inRandomOrder()->value('id') ?? User::factory(),
            'description' => $this->faker->paragraph(),
        ];
    }
}

