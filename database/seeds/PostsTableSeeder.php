<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = \App\Tag::all();

        factory(App\Post::class, 20)->create()->each(function (\App\Post $post) use ($tags) {
            $post->tags()->save($tags->random());
        });
    }
}
