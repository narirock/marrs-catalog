<?php

namespace Database\Factories;

use Marrs\MarrsCatalog\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

class DepartmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Department::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name" => $this->faker->word(),
            "slug" => $this->faker->slug(),
            "enable" => true,
            "author_id" => 1,
        ];
    }
}
