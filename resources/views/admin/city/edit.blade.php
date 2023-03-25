@extends('layouts.admin')
@section('content')
<div class="admin-edit">
    <!-- PUT - APPEND -->
    <!-- PACH - UPDATE -->
    <form action="{{ route('admin.city.update', $city->id) }}" method="POST">
        @csrf
        @method('patch')
        <div class="admin-edit__form-control">
            <label for="name">Название города:</label>
            <input name="name" id="name" type="text" value="{{ $city->title }}">
        </div>

        <div class="admin-edit__form-control">
            <label for="link">Ссылка ведущая на город:</label>
            <input name="link" id="link" type="text" value="{{ $city->link }}">
        </div>

        <div class="admin-edit__form-control">
            <label for="name_predloshniy_padesh">Город в предложном падеже:</label>
            <input name="name_predloshniy_padesh" id="name_predloshniy_padesh" type="text" value="{{ $city->name_predloshniy_padesh }}">
        </div>

        <div>
            <input class="admin-edit__save" type="submit" value="Сохранить">
        </div>
    </form>
</div>
@endsection