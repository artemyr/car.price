@extends('layouts.admin')
@section('content')

{!! $formControll['top'] !!}
@csrf
{!! $formControll['bottom'] !!}

@endsection