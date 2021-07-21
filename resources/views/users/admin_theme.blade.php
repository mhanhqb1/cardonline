@extends('layouts.user_backend')

@section('content')

@foreach($themes as $v)
<div>
    <img src="{{ $v->image }}" />
    <h2>{{ $v->name }}</h2>
    <div>

        <a href="javascript:void(0)" class="{{ $v->id == $user->theme_id ? 'hide' : '' }}">Select</a>

        <a href="{{ route('user.info', ['user_name' => $user->user_name, 'theme_id' => $v->id]) }}" target="_blank">Preview</a>
    </div>
</div>
@endforeach

@endsection
