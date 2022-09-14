@extends('layouts.admin')
@section('content')

<a href="{{ route('admin.category.create') }}">Создать новый</a><br>

@foreach($categories as $category)
    <a href="{{ route('admin.category.edit', $category->id) }}">{{ $category->title }}</a><br>
@endforeach

@endsection
