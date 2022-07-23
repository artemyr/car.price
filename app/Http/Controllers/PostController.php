<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use App\Models\PostTag;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
//        $post = Post::find(1);
//        dump($post->title);
//
       $posts = Post::all();
//        foreach ($posts as $post) {
//            dump($post->title);
//        }

//        $posts = Post::where('is_published', 1)->get();
//        foreach ($posts as $post) {
//            echo $post->title;
//            echo '<br>';
//            echo $post->text;
//            echo '<br>';
//            echo $post->likes;
//            echo '<br>';
//            echo $post->image;
//            echo '<br>';
//            echo '<hr>';
//        }

    //    $post = Post::where('is_published', 1)->first();
//        dump($post->title);


        // $category = Category::find(1);
        // dd($category->posts);

        // $post = Post::find(1);
        // dd($post->category);
        // dd($post->tags);

        // $tag = Tag::find(3);
        // dd($tag->posts);

        return view('post.index', compact('posts'));
    }

    public function create()
    {
        // Post::create([
        //     'title' => 'aaa',
        //     'content' => 'aaa',
        //     'image' => 'aaa',
        //     'likes' => 0,
        //     'is_published' => 1,
        // ]);

        $categorys = Category::all();
        $tags = Tag::all();

        return view('post.create', compact('categorys','tags'));
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => '',
            'category_id' => '',
            'tags' => '',
        ]);

        $tags = $data['tags'];
        unset($data['tags']);

        $post = Post::create($data);

        // foreach ($tags as $tag){
        //     PostTag::firstOrCreate([
        //         'tag_id' => $tag,
        //         'post_id' => $post->id,
        //     ]);
        // }

        $post->tags()->attach($tags);

        return redirect()->route('post.index');
    }

    public function show(Post $post)
    {
        // $post = Post::findOrFail($id);
        
        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categorys = Category::all();
        $tags = Tag::all();

        return view('post.edit', compact('post', 'categorys', 'tags'));
    }

    public function update(Post $post)
    {
        // $post = Post::find(1);
        // $post->update([
        //     'title' => 'upt',
        //     'content' => 'upt',
        //     'image' => 'upt',
        //     'likes' => 2,
        //     'is_published' => 1,
        // ]);

        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => '',
            'tags' => '',

        ]);

        $tags = $data['tags'];
        unset($data['tags']);

        $post->update($data);
        $post->tags()->sync($tags);

        return redirect()->route('post.show', $post->id);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }

    public function delete()
    {
        $post = Post::find(1);
        $post->delete();

//        $post = Post::withoutTrashed()->find(2);
//        $post->restore();
    }

    public function foc()
    {
        $post = Post::firstOrCreate([
            'title' => 'foc',
        ],[
            'title' => 'foc',
            'content' => 'foc',
            'image' => 'foc',
            'likes' => 2,
            'is_published' => 1,
        ]);
    }

    public function uoc()
    {
        $post = Post::updateOrCreate([
            'title' => 'uoc',
        ],[
            'title' => 'uoc',
            'content' => 'uoc',
            'image' => 'uoc',
            'likes' => 20,
            'is_published' => 1,
        ]);
    }
}
