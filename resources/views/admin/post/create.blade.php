@extends('layouts.admin')
@section('content')
<div>
   <form action="{{ route('admin.post.store') }}" method="POST">
        @csrf
        <div class="mb-20">
            <label for="title">Название</label>
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
        
        <div class="mb-20">
            <label for="city">City</label>
            <select name="city" id="city">
                @foreach ($citys as $city)                    
                    <option 
                        value="{{ $city->id }}">
                        {{ $city->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <input type="submit" value="Создать">
        </div>
   </form>
</div>
@endsection