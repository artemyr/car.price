@extends('layouts.admin')
@section('content')
<div class="admin-edit">
    <form {{ $formControl->multipart ? 'enctype="multipart/form-data"' : '' }} action="{{ $formControl->route }}" method="POST">
        @csrf
        @method('patch')
        @foreach ($formControl->controls as $control)
            @if($control->type == 'text')
                <div class="admin-edit__form-control">
                    <label for="{{ $control->code }}">{{ $control->name }}</label>
                    <input name="{{ $control->code }}" id="{{ $control->code }}" type="text" value="{{ $control->value }}">
                </div>
            @endif
            @if($control->type == 'textarea')
                <div class="admin-edit__form-control">
                    <label for="{{ $control->code }}">{{ $control->name }}</label>
                    <textarea name="{{ $control->code }}" id="{{ $control->code }}">{{ $control->value }}</textarea>
                </div>
            @endif
            @if($control->type == 'select')
                <div class="admin-edit__form-control">
                    <label for="{{ $control->code }}">{{ $control->name }}</label>
                    <select name="{{ $control->code }}" id="{{ $control->code }}">
                        @foreach($control->value as $value)
                            <option {{ ($value->selected) ? "selected" : '' }} value="{{ $value->id }}">{{ $value->title }}</option>
                        @endforeach
                    </select>
                </div>
            @endif
            @if($control->type == 'select_multiple')
                <div class="admin-edit__form-control">
                    <label for="{{ $control->code }}">{{ $control->name }}</label>
                    <select multiple name="{{ $control->code }}" id="{{ $control->code }}">
                        @foreach($control->value as $value)
                            <option {{ ($value->selected) ? "selected" : '' }} value="{{ $value->id }}">{{ $value->title }}</option>
                        @endforeach
                    </select>
                </div>
            @endif
            @if($control->type == 'file')
                <div class="admin-edit__form-control">
                    <label for="{{ $control->code }}">{{ $control->name }}</label>
                    <input type="file" name="{{ $control->code }}" id="{{ $control->code }}">
                </div>
            @endif
        @endforeach
        <div>
            <input class="admin-edit__save" type="submit" value="Сохранить">
        </div>
    </form>
</div>
@endsection
