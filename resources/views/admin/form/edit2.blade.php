@extends('layouts.admin')
@section('content')


<div class="admin-edit">
    <form {{ $formControl->multipart ? 'enctype="multipart/form-data"' : '' }} action="{{ $formControl->route }}" method="POST">
        @csrf
        @method('patch')


        @foreach ($formControl->controls as $control)
            {{ $control[0] }}
        @endforeach


        <div>
            <input class="admin-edit__save" type="submit" value="Сохранить">
        </div>
    </form>
</div>

@endsection