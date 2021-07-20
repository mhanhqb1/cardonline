@extends('layouts.user_backend')

@section('content')

@foreach($themes as $v)
<div>
    <img src="{{ $v->image }}" />
    <h2>{{ $v->name }}</h2>
    <div>

        <a href="javascript:void(0)" class="{{ $v->id == $user->theme_id ? 'hide' : '' }}">Select</a>

        <a href="/">Preview</a>
    </div>
</div>
@endforeach

@endsection
