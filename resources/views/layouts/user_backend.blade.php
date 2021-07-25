<?php
$colors = [
    '#fff', '#0066ff', '#333333', '#a6a6a6', '#E6E6E6', '#F9F9F9'
];
$currentRoute = \Request::route()->getName();
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        * {
            margin: 0;
            padding: 0;
            list-style: none;
            text-decoration: none;
            box-sizing: border-box;
        }

        html,
        body {
            height: 100%;
            font-size: 1em;
            color: #232323;
        }

        @foreach($colors as $k=> $v)
        .bg-{{ $k+1 }} {
            background-color: {{ $v }};
        }
        .c-{{ $k+1 }} {
            color: {{ $v }};
        }
        .bc-{{ $k+1 }} {
            border-color: {{ $v }};
        }
        @endforeach

        header {
            width: 100%;
            padding: 24px 0;
            text-align: center;
        }

        .hide {
            display: none;
        }

        h5 > .btn-link {
            font-size: 1.2em;
            font-weight: 500;
            width: 100%;
            text-align: center;
        }

        .container {
            display: block;
            margin: 24px auto;
            padding: 24px;
            border: 1px solid #a6a6a6;
            border-radius: 10px;
            width: 90%;
            max-width: 1024px;
        }

        .btn-submit {
            margin: 0 auto;
            display: block;
        }

        .tabs .tabs-header {
            display: flex;
            flex-direction: row;
        }

        .tabs .tabs-header>a {
            flex: 1;
            text-align: center;
            padding: 10px 0 24px;
            margin-bottom: 36px;
            border-bottom: 4px solid #E6E6E6;
            font-size: 20px;
            align-items: center;
            justify-content: center;
            color: #232323;
        }
        .tabs .tabs-header h2 {
            font-size: 1.5em;
        }

        .tabs .tabs-header>a>span {
            display: block;
        }

        .tabs .tabs-header>a.active {
            border-color: #0066ff;
            color: #0066ff;
        }

        .info>div {
            padding: 12px 24px;
            margin: 12px 0;
            border-radius: 10px;
            display: flex;
            align-items: center;
            flex-wrap: 12px;
        }

        .info>div>span {
            width: 50px;
            font-size: 25px;
        }

        .info>div>div {
            flex: 1;
        }

        .info>div>div label {
            color: #7E7E7E;
            font-size: 12px;
        }

        .info>div>div .user-input {
            position: relative;
            margin-top: 5px;
        }

        .info>div>div .user-input input,
        .info>div>div .user-input textarea {
            width: 100%;
            padding: 10px 40px 10px 10px;
            font-size: 14px;
            outline: none;
            border: 1px solid #a6a6a6;
            border-radius: 5px;
            text-align: left;
        }

        .info>div>div .user-input span {
            position: absolute;
            top: 50%;
            right: 12px;
            transform: translateY(-50%);
            cursor: pointer;
        }

        .social {
            display: flex;
            align-items: center;
            padding: 12px 12px 12px 24px;
            margin: 12px 0;
        }
        .social>div {
            flex: 1;
            margin: 0;
            padding: 0 12px 0 24px;
        }
        .social>div>input {
            width: 100%;
            padding: 10px 40px 10px 10px;
            font-size: 14px;
            outline: none;
            border: 1px solid #a6a6a6;
            border-radius: 5px;
            text-align: left;
            margin: 0;
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
                background-image: url('../images/icon-{{ $k }}-4.svg');
            }
            .sicon-{{ $k }}-1 {
                background-image: url('../images/icon-{{ $k }}-1.svg');
            }
            .sicon-{{ $k }}-4 {
                background-image: url('../images/icon-{{ $k }}-4.svg');
            }
        @endforeach
    </style>
</head>

<body class="">
    <header class="bg-3">
        <a href="/" class="c-1">
            <h1>{{ config('app.name') }}</h1>
        </a>
    </header>
    <div class="container">
        <div class="tabs">
            <div class="tabs-header">
                <a href="{{ route('dashboard') }}" class="{{ $currentRoute == 'dashboard' ? 'active' : '' }}">
                    <span><i class="fas fa-house-user"></i></span> {{ __('sys.user_info') }}
                </a>
                <a href="{{ route('user.theme') }}" class="{{ $currentRoute == 'user.theme' ? 'active' : '' }}">
                    <span><i class="fas fa-adjust"></i></span> {{ __('sys.theme') }}
                </a>
                <a href="/">
                    <span><i class="fas fa-user-lock"></i></span> {{ __('sys.change_pass') }}
                </a>
                <a href="/">
                    <span><i class="fas fa-sign-out-alt"></i></span> {{ __('sys.logout') }}
                </a>
            </div>
            <div class="tabs-content">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script>
        const apiUrl = '{{ route('user.update_info') }}';
        const apiUserSocialUrl = '{{ route('user.update_socials') }}';
        const apiUserSocialDelUrl = '{{ route('user.delete_socials') }}';
        const apiUserSocialSaveUrl = '{{ route('user.save_socials') }}';
        const apiSuccessMessage = '{{ __('sys.save_success') }}';
        const apiErrorMessage = '{{ __('sys.save_error') }}';
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.js-btn-add-social').on('click', function(){
                $('#socialModal').modal();
            });
            $('.js-btn-add-product').on('click', function(){
                $('#productModal').modal();
            });
            $('.js-social-save').on('click', function(){
                let data = {};
                $('#socialModal .form-control').each(function(){
                    let name = $(this).attr('name');
                    let val = $(this).val();
                    data[name] = val;
                });
                $.ajax({
                    url: apiUserSocialUrl,
                    data: data,
                    type: "POST",
                    dataType: "Json",
                    success: function(res) {
                        if (res.status == 'OK') {
                            let html = "<div class='social'>";
                            html += "<span class='sicon sicon-"+data['social_type']+"'></span>";
                            html += "<p>"+data['social_url']+"</p>"
                            html += "</div>";
                            $('.js-social-container').append(html);
                            $('#socialModal').modal('hide');
                            toastr.success(apiSuccessMessage);
                        } else {
                            toastr.error(apiErrorMessage);
                        }
                    },
                    error: function() {
                        toastr.error(apiErrorMessage);
                    }
                });
            });
            $('.social > .js-btn-save').on('click', function() {
                const parent = $(this).parent();
                const id = parent.attr('data-id');
                const value = parent.find('input').val();
                $.ajax({
                    url: apiUserSocialSaveUrl,
                    data: {
                        id: id,
                        val: value
                    },
                    type: "POST",
                    dataType: "Json",
                    success: function(res) {
                        if (res.status == 'OK') {
                            toastr.success(apiSuccessMessage);
                        } else {
                            toastr.error(apiErrorMessage);
                        }
                    },
                    error: function() {
                        toastr.error(apiErrorMessage);
                    }
                });

            });
            $('.social > .js-btn-del').on('click', function() {
                const parent = $(this).parent();
                const id = parent.attr('data-id');
                $.ajax({
                    url: apiUserSocialDelUrl,
                    data: {
                        id: id
                    },
                    type: "POST",
                    dataType: "Json",
                    success: function(res) {
                        if (res.status == 'OK') {
                            parent.remove();
                            toastr.success(apiSuccessMessage);
                        } else {
                            toastr.error(apiErrorMessage);
                        }
                    },
                    error: function() {
                        toastr.error(apiErrorMessage);
                    }
                });

            });
            $('.info#tab-1 .btn-submit').on('click', function() {
                let parent = $(this).closest(".info");
                let data = {};
                parent.find('.input-value').each(function(e) {
                    let _val = $(this).val();
                    let _name = $(this).attr('name');
                    data[_name] = _val;
                });
                $.ajax({
                    url: apiUrl,
                    data: data,
                    type: "POST",
                    dataType: "Json",
                    success: function(data) {
                        if (data.status == 'OK') {
                            toastr.success(apiSuccessMessage);
                        } else {
                            toastr.error(apiErrorMessage);
                        }
                    },
                    error: function() {
                        toastr.error(apiErrorMessage);
                    }
                });
            });
        });
    </script>
</body>

</html>
