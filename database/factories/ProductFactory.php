<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
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
        
        $name = $this->faker->words(2,true);
        $res= DB::table('categories')->inRandomOrder()->limit(1)->first(['id']);
        $status = ['active','draft'];
        return [
            //
            'name' => $name,
            'slug'=>Str::slug($name),
            'category_id'=>$res ? $res->id : null,
            'description'=>$this->faker->words(200, true),
            'image_path'=>$this->faker->imageUrl(),
            'price'=>$this->faker->numberBetween(10.5, 3000.5),
            'sale_price'=>$this->faker->numberBetween(10.5, 3000),
            'quantity'=>$this->faker->numberBetween(10.5, 3000),
            'sku'=>$this->faker->unique()->word(),
            'wight'=>$this->faker->numberBetween(10.5, 3000),
            'width'=>$this->faker->numberBetween(10.5, 3000),
            'height'=>$this->faker->numberBetween(10.5, 3000),
            'length'=>$this->faker->numberBetween(10.5, 3000),
            'status'=>$status[rand(0,1)]
        ];
    }
}
