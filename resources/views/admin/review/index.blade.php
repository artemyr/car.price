@extends('layouts.admin')
@section('content')

<div class="admin-list">
    <a class="admin-list__create" href="{{ route('admin.review.create') }}">Создать новый</a><br>

    <div class="admin-list__body">
        <div class="admin-list__form-control">
            <div class="admin-list__form-control-item">№</div>
            <div class="admin-list__form-control-item">Название</div>
            <div class="admin-list__form-control-item">Ссылка</div>
            <div class="admin-list__form-control-item"></div>
        </div>
        @foreach($reviews as $key => $review)
        <div class="admin-list__form-control">
            <div class="admin-list__form-control-item">{{ ($key+1) }}</div>
            <div class="admin-list__form-control-item">
                <a class="admin-list__link" href="{{ route('admin.review.edit', $review->id) }}">{{ $review->title }}</a>
            </div>
            <div class="admin-list__form-control-item">
                {{ $review->link }}
            </div>
            <div class="admin-list__form-control-item">
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
