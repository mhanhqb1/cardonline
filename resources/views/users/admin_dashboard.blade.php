<?php
$userInfos = [
    'avatar' => [
        'icon' => 'user-circle',
        'title' => __('user.avatar')
    ],
    'name' => [
        'icon' => 'user',
        'title' => __('user.name')
    ],
    'job_title' => [
        'icon' => 'network-wired',
        'title' => __('user.job_title')
    ],
    'company_name' => [
        'icon' => 'chart-pie',
        'title' => __('user.company_name')
    ],
    'phone' => [
        'icon' => 'phone-square',
        'title' => __('user.phone')
    ],
    'address' => [
        'icon' => 'building',
        'title' => __('user.address')
    ],
];
$colors = [
    '#fff', '#0066ff', '#333333', '#a6a6a6', '#E6E6E6', '#F9F9F9'
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
            font-size: 14px;
            color: #232323;
        }

        .btn {
            padding: 0 24px;
            line-height: 32px;
            border-radius: 5px;
            font-weight: 500;
            cursor: pointer;
            outline: none;
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

        .tabs {
            display: flex;
            flex-direction: row;
        }

        .tabs>a {
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

        .tabs>a>span {
            display: block;
        }

        .tabs>a.active {
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

        .info>div>div .user-input input {
            width: 100%;
            padding: 10px 40px 10px 10px;
            font-size: 14px;
            outline: none;
            border: 1px solid #a6a6a6;
            border-radius: 5px;
        }

        .info>div>div .user-input span {
            position: absolute;
            top: 50%;
            right: 12px;
            transform: translateY(-50%);
            cursor: pointer;
        }
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
            <a href="/" class="active">
                <span><i class="fas fa-house-user"></i></span> {{ __('sys.user_info') }}
            </a>
            <a href="/">
                <span><i class="fas fa-adjust"></i></span> {{ __('sys.theme') }}
            </a>
            <a href="/">
                <span><i class="fas fa-user-lock"></i></span> {{ __('sys.change_pass') }}
            </a>
            <a href="/">
                <span><i class="fas fa-sign-out-alt"></i></span> {{ __('sys.logout') }}
            </a>
        </div>
        <div class="tab-content">
            <div class="info">
                <h2 class="info-header">Gioi thieu</h2>
                <?php foreach ($userInfos as $k => $v) : ?>
                    <div class='bg-6'>
                        <span><i class="fas fa-{{ $v['icon'] }}"></i></span>
                        <div>
                            <label>{{ $v['title'] }}</label>
                            <div class="user-input">
                                <input type="text" name="{{ $k }}" value="{{ $user->$k }}" class="input-value" />
                                <!-- <span><i class="fas fa-edit"></i></span> -->
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <button class='btn bg-2 bc-2 c-1 btn-submit'>{{ __('sys.update') }}</button>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script>
        const apiUrl = '{{ route('user.update_info') }}';
        const apiSuccessMessage = '{{ __('sys.save_success') }}';
        const apiErrorMessage = '{{ __('sys.save_error') }}';
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.info .btn-submit').on('click', function() {
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
