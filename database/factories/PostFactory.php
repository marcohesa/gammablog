<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $name = $this->faker->unique()->sentence();
        return [
            'title' => $name,
            'slug' => Str::slug($name),
            'description' => $this->faker->text(250),
            'publicationDate' => $this->faker->dateTime()->format('Y-m-d'),
            'body' => $this->faker->text(2000),
            'status' => $this->faker->randomElement([1,2,3]),
            'category_id' => Category::all()->random()->id,
        ];
    }
}
