@extends('layouts.main')
@section('content')
<div>
   <form action="{{ route('post.store') }}" method="POST">
        @csrf
        <div class="mb-20">
            <label for="title">Title</label>
            <input 
                value="{{ old('title') }}"
                name="title" id="title" type="text">

            @error('title')
            <p class="danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-20">
            <label for="content">Content</label>
            <textarea name="content" id="content">{{ old('content') }}</textarea>

            @error('content')
            <p class="danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-20">
            <label for="image">Image</label>
            <input name="image" id="image" type="text">
        </div>
        <div class="mb-20">
            <label for="category">Category</label>
            <select name="category_id" id="category">
                @foreach ($categorys as $category)
                    <option 
                        {{ old('category_id') == $category->id ? ' selected' : '' }}
                        value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-20">
            <label for="tags">Tags</label>
            <select multiple name="tags[]" id="tags">
                @foreach ($tags as $tag)                    
                    <option 
                        value="{{ $tag->id }}">
                        {{ $tag->title }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <input type="submit" value="Create">
        </div>
   </form>
</div>
@endsection