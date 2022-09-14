@extends('layouts.admin')
@section('content')
<div>
    <form action="{{ route('admin.city.store') }}" method="POST">
        @csrf

        <div class="mb-20">
            <label for="name">Название города:</label>
            <input name="name" id="name" type="text" value="{{ old('name') }}">
        </div>

        <div class="mb-20">
            <label for="link">Ссылка ведущая на город:</label>
            <input name="link" id="link" type="text" value="{{ old('link') }}">
        </div>

        <div class="mb-20">
            <label for="name_predloshniy_padesh">Город в предложном падеже:</label>
            <input name="name_predloshniy_padesh" id="name_predloshniy_padesh" type="text" value="{{ old('name_predloshniy_padesh') }}">
        </div>

        <div>
            <input type="submit" value="Создать">
        </div>
    </form>
</div>
@endsection