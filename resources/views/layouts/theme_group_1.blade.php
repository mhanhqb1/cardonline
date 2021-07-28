<?php
$socialConfig = config('app.socials');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - {{ config('app.name') }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            list-style: none;
            text-decoration: none;
            box-sizing: border-box;
        }
        .b-50 {
            border-radius: 50%;
        }
        .t-center {
            text-align: center;
        }
        .h-100 {
            height: 100vh;
        }
        .d-flex {
            display: flex;
        }
        .d-flex--center {
            justify-content: center;
        }
        .d-flex--middle {
            align-items: center;
        }
        .card {
            width: 90%;
            max-width: 500px;
        }
        .card-1 {
            margin-top: 48px;
        }
        .card-1 .logo {
            width: 100px;
            height: 100px;
        }
        .card-1 > h2 {
            margin: 24px 0;
        }
        .card-1 > p {
            margin-bottom: 24px;
        }
        .socials a {
            color: #fff;
            text-decoration: none;
        }
        .socials li {
            width: 100%;
            background-color: #232323;
            margin: 10px;
            padding: 24px 24px;
            color: #fff;
            font-size: 1.2em;
            background-position: center left 24px;
            background-repeat: no-repeat;
            background-size: 40px 40px;
        }
        .sicon {
            width: 50px;
            height: 50px;
            background-repeat: no-repeat;
            background-position: center;
            background-size: 100%;
        }
        @foreach($socialConfig as $k => $v)
            .sicon-{{ $k }} {
                background-image: url('../images/icon-{{ $k }}.svg');
            }
            .sicon-{{ $k }}-1 {
                background-image: url('../images/icon-{{ $k }}-1.svg');
            }
            .sicon-{{ $k }}-4 {
                background-image: url('../images/icon-{{ $k }}-4.svg');
            }
        @endforeach
    </style>
    @yield('head')
</head>
<body class="@yield('body-class')">
@yield('content')

@yield('footer')
</body>
</html>
