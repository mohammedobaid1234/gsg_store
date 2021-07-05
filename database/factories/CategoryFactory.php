<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;
    
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->words(2,true);
        $res= DB::table('categories')->inRandomOrder()->limit(1)->first(['id']);
        // echo $res;
        $status = ['active','draft'];
        return [
            //
            'name' => $name,
            'slug'=>Str::slug($name),
            'parent_id'=>$res ? $res->id : null,
            'description'=>$this->faker->words(200, true),
            'image_path'=>$this->faker->imageUrl(),
            'status'=>$status[rand(0,1)]
        ];
    }
}
