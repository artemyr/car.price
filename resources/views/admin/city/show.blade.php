@extends('layouts.admin')
@section('content')

<div>
    <div>
        Название города:<br> {{ $city->name }}
    </div>
    <div>
        Ссылка ведущая на город:<br> {{ $city->link }}
    </div>
    <div>
        Город в предложном падеже:<br> {{ $city->name_predloshniy_padesh }}
    </div>
</div>

@endsection