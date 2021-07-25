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
$socialConfig = config('app.socials');
?>
@extends('layouts.user_backend')

@section('content')
<div id="accordion">
    <div class="card">
        <div class="card-header" id="headingOne">
            <h5 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    {{ __('sys.intro') }}
                </button>
            </h5>
        </div>

        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="info card-body" id="tab-1">
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
                <div class='bg-6'>
                    <span><i class="fa fa-info-circle" aria-hidden="true"></i></span>
                    <div>
                        <label>{{ __('user.description') }}</label>
                        <div class="user-input">
                            <textarea name="description" class="input-value" rows="5">{{ $user->description }}</textarea>
                            <!-- <span><i class="fas fa-edit"></i></span> -->
                        </div>
                    </div>
                </div>
                <button class='btn bg-2 bc-2 c-1 btn-submit'>{{ __('sys.update') }}</button>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingTwo">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    {{ __('sys.contact_info') }}
                </button>
            </h5>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="card-body">
                <div class='js-social-container'>
                    @if (!empty($userSocials))
                        @foreach ($userSocials as $v)
                        <div class='social bg-6' data-id="{{ $v->id }}">
                            <span class='sicon sicon-{{ $v->type }}'></span>
                            <div>
                                <input class='form-group' value="{{ $v->url }}"/>
                            </div>
                            <span class='btn js-btn-save'><i class="fas fa-save"></i></span>
                            <span class='btn js-btn-del'><i class="fas fa-trash-alt"></i></span>
                        </div>
                        @endforeach
                    @endif
                </div>
                <button class='btn bg-2 bc-2 c-1 js-btn-add-social'>{{ __('sys.add_new') }}</button>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingThree">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    {{ __('sys.product_info') }}
                </button>
            </h5>
        </div>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
            <div class="card-body">
                <div class='js-product-container'></div>
                <button class='btn bg-2 bc-2 c-1 js-btn-add-product'>{{ __('sys.add_new') }}</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="socialModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('sys.add_new_social') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>{{ __('sys.type') }}</label>
                    <select name="social_type" class="form-control js-social-type">
                        @foreach ($socialConfig as $k => $v)
                            <option value="{{ $k }}">{{ $v }}</option>
                        @endforeach>
                    </select>
                </div>
                <div class="form-group">
                    <label>{{ __('sys.link') }}</label>
                    <input type="text" value="" name="social_url" class="form-control" />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary js-social-save">{{ __('sys.save') }}</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('sys.close') }}</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="productModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('sys.add_new_product') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>{{ __('sys.image') }}</label>
                    <input type="text" value="" name="product_image" class="form-control" />
                </div>
                <div class="form-group">
                    <label>{{ __('sys.link') }}</label>
                    <input type="text" value="" name="product_url" class="form-control" />
                </div>
                <div class="form-group">
                    <label>{{ __('sys.name') }}</label>
                    <input type="text" value="" name="product_name" class="form-control" />
                </div>
                <div class="form-group">
                    <label>{{ __('sys.price') }}</label>
                    <input type="text" value="" name="product_price" class="form-control" />
                </div>
                <div class="form-group">
                    <label>{{ __('sys.description') }}</label>
                    <textarea rows="5" name="product_description" class="form-control"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary js-product-save">{{ __('sys.save') }}</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('sys.close') }}</button>
            </div>
        </div>
    </div>
</div>

@endsection
