<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'qty' => $this->faker->numberBetween(1,10),
            'pur_price' => $this->faker->numberBetween(1,20),
            'sel_price' => $this->faker->numberBetween(1,50)
        ];
    }
}
