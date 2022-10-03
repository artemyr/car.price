@extends('layouts.admin')
@section('content')

<div class="admin-show">
    <div class="admin-show__form-control">
        <div class="admin-show__label">Название города:</div> 
        <div class="admin-show__content">{{ $city->name }} </div>
    </div>
    <div class="admin-show__form-control">
        <div class="admin-show__label">Ссылка ведущая на город:</div> 
        <div class="admin-show__content">{{ $city->link }} </div>
    </div>
    <div class="admin-show__form-control">
        <div class="admin-show__label">Город в предложном падеже:</div> 
        <div class="admin-show__content">{{ $city->name_predloshniy_padesh }} </div>
    </div>
    <form action="{{ route('admin.city.destroy', $city->id) }}" method="POST">
        @csrf
        @method('delete')
        <input class="admin-show__remove" type="submit" value="Удалить">
    </form>
</div>

@endsection