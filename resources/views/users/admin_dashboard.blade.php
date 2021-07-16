<?php
$userInfos = [
    'avatar' => [
        'icon' => 'user-circle',
        'title' => 'Hinh anh'
    ],
    'name' => [
        'icon' => 'user',
        'title' => 'Ho ten'
    ],
    'job_title' => [
        'icon' => 'network-wired',
        'title' => 'Cong viec'
    ],
    'phone' => [
        'icon' => 'phone-square',
        'title' => 'So dien thoai'
    ],
    'address' => [
        'icon' => 'building',
        'title' => 'Dia chi'
    ],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

        .bg-1 {
            background-color: #333;
        }

        .color-1 {
            color: #fff;
        }

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
            background-color: #F9F9F9;
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
    <header class="bg-1">
        <a href="/" class="color-1">
            <h1>Home page</h1>
        </a>
    </header>
    <div class="container">
        <div class="tabs">
            <a href="/" class="active">
                <span><i class="fas fa-house-user"></i></span> Trang ca nhan
            </a>
            <a href="/">
                <span><i class="fas fa-adjust"></i></span> Giao dien
            </a>
            <a href="/">
                <span><i class="fas fa-user-lock"></i></span> Doi mat khau
            </a>
            <a href="/">
                <span><i class="fas fa-sign-out-alt"></i></span> Dang xuat
            </a>
        </div>
        <div class="tab-content">
            <div class="info">
                <h2 class="info-header">Gioi thieu</h2>
                <?php foreach ($userInfos as $k => $v): ?>
                <div>
                    <span><i class="fas fa-{{ $v['icon'] }}"></i></span>
                    <div>
                        <label>{{ $v['title'] }}</label>
                        <div class="user-input">
                            <input type="text" name="{{ $k }}" value=""/>
                            <!-- <span><i class="fas fa-edit"></i></span> -->
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

</body>

</html>
