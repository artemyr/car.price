@extends('layouts.admin')
@section('content')
<div class="admin-edit">
    <!-- PUT - APPEND -->
    <!-- PACH - UPDATE -->
    <form action="{{ route('admin.post.update', $post->id) }}" method="POST">
        @csrf
        @method('patch')
        <div class="admin-edit__form-control">
            <label for="title">Title</label>
            <input name="title" id="title" type="text" value="{{ $post->title }}">
        </div>
        <div class="admin-edit__form-control">
            <label for="content">Content</label>
            <textarea name="content" id="content">{{ $post->content }}</textarea>
        </div>
        <div class="admin-edit__form-control">
            <label for="image">Image</label>
            <input name="image" id="image" type="text" value="{{ $post->image }}">
        </div>
        <div class="admin-edit__form-control">
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
        <div class="admin-edit__form-control">
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

        <div class="admin-edit__form-control">
            <label for="city">City</label>
            <select name="city" id="city">
                @foreach ($cities as $city)
                    <option 
                    
                        {{ $city->id == $post->city_id ? ' selected' : '' }}

                        value="{{ $city->id }}">
                        {{ $city->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <input class="admin-edit__save" type="submit" value="Сохранить">
        </div>
    </form>
</div>
@endsection