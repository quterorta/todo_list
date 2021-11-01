<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        return [
            'title' => $this->faker->realText(25),
            'description' => $this->faker->realText(100),
            'user_id' => rand(1, 3),
            'completed' => $this->faker->boolean,
        ];
    }
}
