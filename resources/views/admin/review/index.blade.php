@extends('layouts.admin')
@section('content')

<div class="admin-list">
    <a class="admin-list__create" href="{{ route('admin.review.create') }}">Создать новый</a><br>

    <div class="admin-list__body">
        @foreach($reviews as $review)
        <div class="admin-list__form-control">
            <div>
                <a class="admin-list__link" href="{{ route('admin.review.edit', $review->id) }}">{{ $review->title }}</a> 
            </div>
            <div>
                <form action="{{ route('admin.review.destroy', $review->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <input class="admin-list__remove" type="submit" value="x">
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
