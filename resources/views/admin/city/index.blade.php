@extends('layouts.admin')
@section('content')

<div class="admin-list">
    <a class="admin-list__create" href="{{ route('admin.city.create') }}">Создать новый</a><br>

    <div class="admin-list__body">
        <div class="admin-list__form-control">
            <div class="admin-list__form-control-item">№</div>
            <div class="admin-list__form-control-item">Название</div>
            <div class="admin-list__form-control-item">Ссылка</div>
            <div class="admin-list__form-control-item"></div>
        </div>
        @foreach($cities as $key => $city)
        <div class="admin-list__form-control">
            <div class="admin-list__form-control-item">{{ ($key+1) }}</div>
            <div class="admin-list__form-control-item">
                <a class="admin-list__link" href="{{ route('admin.city.edit', $city->id) }}">{{ $city->title }}</a>
            </div>
            <div class="admin-list__form-control-item">
                {{ $city->link }}
            </div>
            <div class="admin-list__form-control-item">
                <form action="{{ route('admin.city.destroy', $city->id) }}" method="POST">
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