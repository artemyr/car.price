@extends('layouts.admin')
@section('content')

{!! $formControll['top'] !!}
@csrf
@method('patch')
{!! $formControll['bottom'] !!}

@endsection