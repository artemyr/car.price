@extends('layouts.admin')
@section('content')

<div class="admin-list">
    <a class="admin-list__create" href="{{ route('admin.city.create') }}">Создать новый</a><br>

    <div class="admin-list__body">
        @foreach($cities as $city)
        <div class="admin-list__form-control">
            <form action="{{ route('admin.city.destroy', $city->id) }}" method="POST">
                @csrf
                @method('delete')
                <input class="admin-list__remove" type="submit" value="x">
            </form>
            <a class="admin-list__link" href="{{ route('admin.city.edit', $city->id) }}">{{ $city->name }}</a>
        </div>
        @endforeach
    </div>
</div>

@endsection