@extends('layouts.theme_group_1')
@section('title')
{{ __('Theme 1') }}
@endsection

@section('head')

@endsection

@section('content')
<div class="d-flex d-flex--center h-100">
    <div class="card card-1 t-center">
        <img src="https://images.unsplash.com/photo-1626775921074-0a59b6740029?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80" class="logo b-50"/>
        <h2>{{ $user->name }}</h2>
        <p>{{ $user->description }}</p>
        <ul class="socials">
            @if (!empty($userSocials))
                @foreach($userSocials as $v)
                <a href="{{ $v->url }}">
                    <li style="background-image: url('{{ asset('images/icon-'.strtolower($v->type).'.svg') }}');">
                        <span class="social-text">{{ config('app.socials')[$v->type] }}</span>
                    </li>
                </a>
                @endforeach
            @endif
        </ul>
    </div>
</div>
@endsection
