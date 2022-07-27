@extends('layouts.main')
@section('content')
<div>
    <!-- PUT - APPEND -->
    <!-- PACH - UPDATE -->
   <form action="{{ route('post.update', $post->id) }}" method="POST">
        @csrf
        @method('patch')
        <div class="mb-20">
            <label for="title">Title</label>
            <input name="title" id="title" type="text" value="{{ $post->title }}">
        </div>
        <div class="mb-20">
            <label for="content">Content</label>
            <textarea name="content" id="content">{{ $post->content }}</textarea>
        </div>
        <div class="mb-20">
            <label for="image">Image</label>
            <input name="image" id="image" type="text" value="{{ $post->image }}">
        </div>
        <div class="mb-20">
            <label for="category">Category</label>
            <select name="category_id" id="category">
                @foreach ($categorys as $category)                    
                    <option 
                        {{ $category->id == $post->category->id ? ' selected' : '' }}                    
                        value="{{ $category->id }}">
                        {{ $category->title }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-20">
            <label for="tags">Tags</label>
            <select multiple name="tags[]" id="tags">
                @foreach ($tags as $tag)                    
                    <option 
                    
                        @foreach($post->tags as $postTag)
                        {{ $tag->id == $postTag->id ? ' selected' : '' }}
                        @endforeach

                        value="{{ $tag->id }}">
                        {{ $tag->title }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <input type="submit" value="Update">
        </div>
   </form>
</div>
@endsection