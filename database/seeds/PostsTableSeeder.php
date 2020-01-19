<?php

use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $category1 = Category::create([
            'name' => 'News'
        ]);

        $author1 = App\User::create([
            'name' => 'John Doe',
            'email' => 'john.doe@gmail.com',
            'password' => Hash::make('password')
        ]);

         $author2 = App\User::create([
            'name' => 'Jane Doe',
            'email' => 'jane.doe@gmail.com',
            'password' => Hash::make('password')
        ]);

        $category2 = Category::create([
            'name' => 'Marketing'
        ]);

        $category3 = Category::create([
            'name' => 'Partnership'
        ]);

        $post1 = Post::create([
            'title' => 'Lorem ipsum dolor sit amet',
            'description' => 'Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet',
            'content' => 'Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet',
            'category_id' => $category1->id,
            'image' => 'posts/6.jpg',
            'user_id' => $author1->id

        ]);

        $post2 = $author2->posts()->create([
            'title' => 'Lorem ipsum dolor sit amet 2',
            'description' => 'Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet 2',
            'content' => 'Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet 2',
            'category_id' => $category2->id,
             'image' => 'posts/7.jpg'
        ]);

        $post3 = $author1->posts()->create([
            'title' => 'Lorem ipsum dolor sit amet 3',
            'description' => 'Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet 3',
            'content' => 'Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet 3',
            'category_id' => $category3->id,
             'image' => 'posts/8.jpg'
        ]);

        $post4 = $author2->posts()->create([
            'title' => 'Lorem ipsum dolor sit amet 4',
            'description' => 'Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet 4',
            'content' => 'Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet 4',
            'category_id' => $category2->id,
             'image' => 'posts/9.jpg'
        ]);

        $tag1 = Tag::create([
            'name' => 'job'
        ]);

         $tag2 = Tag::create([
            'name' => 'customers'
        ]);

         $tag3 = Tag::create([
            'name' => 'record'
        ]);

         $post1->tags()->attach([$tag1->id, $tag2->id]);

         $post2->tags()->attach([$tag2->id, $tag3->id]);

         $post3->tags()->attach([$tag1->id, $tag3->id]);

         $post3->tags()->attach([$tag1->id, $tag3->id]);

    }
}
