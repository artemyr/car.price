@extends('layouts.admin')
@section('content')

@foreach($cities as $city)
    <a href="{{ route('admin.city.edit', $city->id) }}">{{ $city->name }}</a><br>
@endforeach

@endsection