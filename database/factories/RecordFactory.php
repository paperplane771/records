<?php

namespace Database\Factories;

use App\Models\Record;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecordFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Record::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'year' => $this->faker->numberBetween(1860,Carbon::now()->year),
            'size' => $this->faker->numberBetween(12,35)
        ];
    }
}
