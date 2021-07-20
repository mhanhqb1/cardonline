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
?>
@extends('layouts.user_backend')

@section('content')
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
@endsection
