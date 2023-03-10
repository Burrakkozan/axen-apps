<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        // $name =  $this->faker->unique()->words($nb = 4, $asText = true);
        // $slug = Str::slug($name);
        // return [
        //     'name' => $name,
        //     'slug' => $slug,
        //     'short_description' => $this->faker->text(200),
        //     'description' => $this->faker->text(1000),
        //     'regular_price' => $this->faker->numberBetween(50, 1000),
        //     // 'sale_price' => $this->faker->numberBetween(10, 300), //nullable
        //     'sku' => 'DIGI' . $this->faker->unique()->numberBetween(1, 500),
        //     'stock_status' => 'instock',
        //     'qty' => $this->faker->numberBetween(5, 100),
        //     'image' => 'digital_' . $this->faker->numberBetween(10, 22) . '.jpg',
        //     // 'image' => 'default.png',
        //     'category_id' => $this->faker->numberBetween(1, 10),
        // ];
    }
}
