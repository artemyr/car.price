@extends('layouts.admin')
@section('content')
<div>
    <!-- PUT - APPEND -->
    <!-- PACH - UPDATE -->
    <form action="{{ route('admin.city.update', $city->id) }}" method="POST">
        @csrf
        @method('patch')
        <div class="mb-20">
            <label for="name">Название города:</label>
            <input name="name" id="name" type="text" value="{{ $city->name }}">
        </div>

        <div class="mb-20">
            <label for="link">Ссылка ведущая на город:</label>
            <input name="link" id="link" type="text" value="{{ $city->link }}">
        </div>

        <div class="mb-20">
            <label for="name_predloshniy_padesh">Город в предложном падеже:</label>
            <input name="name_predloshniy_padesh" id="name_predloshniy_padesh" type="text" value="{{ $city->name_predloshniy_padesh }}">
        </div>

        <div>
            <input type="submit" value="Update">
        </div>
    </form>
</div>
@endsection