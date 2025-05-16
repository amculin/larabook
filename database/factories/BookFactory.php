<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model>
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $dimension = fake()->numberBetween(15, 40) . 'cm x ';
        $dimension .= fake()->numberBetween(15, 30) . 'cm';

        return [
            'publisher_id' => rand(1, 10),
            'title' => ucwords(fake()->sentence(7)),
            'dimension' => $dimension,
            'stock' => fake()->numberBetween(0, 20),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
    }
}
