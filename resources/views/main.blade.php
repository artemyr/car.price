@extends('layouts.main')

@section('title') {{strip_tags(str_replace('<br>',' ',$banner->title))}} @endsection

@section('content')

@include('includes.banner')

@include('includes.staticInfo')

@endsection
