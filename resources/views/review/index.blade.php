@extends('layouts.main')
@section('content')

@foreach($reviews as $review)
<div>
    <div>{{ $review->title }}</div>
    <div>{{ $review->content }}</div>
</div><br>
@endforeach

@endsection