<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Tag;
use App\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Model::unguard();
        $this->call('TagTableSeeder');
        $this->call('PostTableSeeder');
    }

}

class PostTableSeeder extends Seeder
{
    /**
     * Seed the posts table
     */
    public function run()
    {
        // Pull all the tag names from the file
        $tags = Tag::pluck('tag')->all();

        Post::truncate();

        // Don't forget to truncate the pivot table
        DB::table('post_tag_pivot')->truncate();

        factory(Post::class, 20)->create()->each(function ($post) use ($tags) {

            // 30% of the time don't assign a tag
            if (mt_rand(1, 100) <= 30) {
                return;
            }

            shuffle($tags);
            $postTags = [$tags[0]];

            // 30% of the time we're assigning tags, assign 2
            if (mt_rand(1, 100) <= 30) {
                $postTags[] = $tags[1];
            }

            $post->syncTags($postTags);
        });
    }
}
class TagTableSeeder extends Seeder
{
    /**
     * Seed the tags table
     */
    public function run()
    {
        Tag::truncate();

        factory(Tag::class, 5)->create();
    }
}