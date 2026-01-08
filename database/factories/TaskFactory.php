<?php

namespace Database\Factories;

use App\Models\Lead;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'lead_id' => Lead::factory(), // Создаст новый лид, если не передан существующий
            'title' => fake()->sentence(3),
            'due_at' => fake()->dateTimeBetween('now', '+1 month'),
            'is_done' => fake()->boolean(20), // 20% шанс, что задача выполнена
        ];
    }
}
