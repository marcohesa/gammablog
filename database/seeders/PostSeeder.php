<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = Post::factory(20)->create();
        foreach ($posts as $post) {
            Image::factory(1)->create([
                'imageable_id' => $post->id,
                'imageable_type' => Post::class,
            ]);
            $post->users()->attach(User::all()->random()->id);
            $post->users()->attach(User::all()->random()->id);
            $post->users()->attach(User::all()->random()->id);
            $post->users()->attach(User::all()->random()->id);
            $post->users()->attach(User::all()->random()->id);
            $post->users()->attach(User::all()->random()->id);
        }
    }
}
