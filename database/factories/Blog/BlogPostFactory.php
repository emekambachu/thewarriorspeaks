<?php

namespace Database\Factories\Blog;

use Illuminate\Database\Eloquent\Factories\Factory;

class BlogPostFactory extends Factory
{
    protected $imagePath = 'photos/blog/posts';
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'title' => $this->faker->sentence(),
            'author' => $this->faker->name(),
            'description' => $this->faker->paragraph(),
            'category_id' => $this->faker->numberBetween(1, 4),
            'image' => 'https://via.placeholder.com/200',
            'image_path' => @config('app.url').$this->imagePath.'/',
            'status' => 'published',
        ];
    }
}
