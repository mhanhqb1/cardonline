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
