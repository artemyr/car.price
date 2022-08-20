<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\City;
use App\Models\Article;
use App\Models\Review;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    private function createCities()
    {
        $data = [];
        $data[] = ['name' => 'Краснодар', 'link' => 'krasnodar', 'name_predloshniy_padesh' => 'Краснодаре'];
        $data[] = ['name' => 'Москва', 'link' => 'moskow', 'name_predloshniy_padesh' => 'Москве'];
        $data[] = ['name' => 'Санкт-Петербург', 'link' => 'saint-peterburg', 'name_predloshniy_padesh' => 'Санкт-Петербурге'];
        $data[] = ['name' => 'Ростов-на-Дону', 'link' => 'rostov-on-don', 'name_predloshniy_padesh' => 'Ростове-на-Дону'];

        foreach($data as $item)
            City::create($item);
    }

    private function createCategories()
    {
        $data = [];
        $data[] = ['title' => 'С проблемами', 'link' => 's-problemami'];
        $data[] = ['title' => 'По назначению', 'link' => 'po-naznacheniu'];
        $data[] = ['title' => 'По кузову', 'link' => 'po-kuzovu'];
        $data[] = ['title' => 'По рулю', 'link' => 'po-rulu'];

        foreach($data as $item)
            Category::create($item);
    }

    private function createPosts()
    {
        $data = [];
        $data[] = 
        [
            'title' => 'краснодар - битое авто',
            'content' => 'объявление в городе краснодар категория битое авто',
            'likes' => 0,
            'city_id' => 1,
            'is_published' => 1,
            'category_id' => 1,
            'link' => 'krasnodar-bitoe-auto'
        ];
        $data[] = 
        [
            'title' => 'москва - битое авто',
            'content' => 'объявление в городе москва категория битое авто',
            'likes' => 0,
            'city_id' => 2,
            'is_published' => 1,
            'category_id' => 1,
            'link' => 'moskow-bitoe-auto'
        ];
        $data[] = 
        [
            'title' => 'краснодар - убитое авто',
            'content' => 'объявление в городе краснодар категория убитое авто',
            'likes' => 0,
            'city_id' => 1,
            'is_published' => 1,
            'category_id' => 2,
            'link' => 'krasnodar-ubitue-auto'
        ];
        $data[] = 
        [
            'title' => 'москва - убитое авто',
            'content' => 'объявление в городе москва категория убитое авто',
            'likes' => 0,
            'city_id' => 2,
            'is_published' => 1,
            'category_id' => 2,
            'link' => 'moskow-ubitue-auto'
        ];

        foreach($data as $item)
            Post::create($item);
    }

    private function createArticles()
    {
        $data = [];
        $data[] = 
        [
            'title' => 'краснодар - статья 1',
            'content' => 'объявление в городе краснодар 1',
            'link' => 'kras-1',
        ]; 
        $data[] = 
        [
            'title' => 'краснодар - статья 2',
            'content' => 'объявление в городе краснодар 2',
            'link' => 'kras-2',
        ];    
        $data[] = 
        [
            'title' => 'Москва - статья 1',
            'content' => 'объявление в городе Москва 1',
            'link' => 'mos-1',
        ]; 
        $data[] = 
        [
            'title' => 'Москва - статья 2',
            'content' => 'объявление в городе Москва 2',
            'link' => 'mos-2',
        ];     

        foreach($data as $item)
            Article::create($item);
    }

    private function createReviews()
    {
        $data = [];
        $data[] = 
        [
            'title' => 'краснодар - отзыв 1',
            'content' => 'отзыв в городе краснодар 1',
        ]; 
        $data[] = 
        [
            'title' => 'краснодар - отзыв 2',
            'content' => 'отзыв в городе краснодар 2',
        ];    
        $data[] = 
        [
            'title' => 'Москва - отзыв 1',
            'content' => 'отзыв в городе Москва 1',
        ]; 
        $data[] = 
        [
            'title' => 'Москва - отзыв 2',
            'content' => 'отзыв в городе Москва 2',
        ];     

        foreach($data as $item)
            Review::create($item);
    }

    public function run()
    {
        $this->createCities();
        $this->createCategories();
        $this->createPosts();
        $this->createArticles();
        $this->createReviews();
        
        // $tags = Tag::factory(6)->create();        
        // foreach($posts as $post) {
        //     $tagsIds = $tags->random(5)->pluck('id');
        //     $post->tags()->attach($tagsIds);
        // }

        \App\Models\User::factory(1)->create();
    }
}
