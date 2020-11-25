<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ trans('message.title')}}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>

@include('pages.components.header')
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="featured__controls">
                    <ul>
                        <li class="active" data-filter="*">{{ trans('message.cate')}}</li>
                    </ul>
                </div>
            </div>
        </div>
         @include('errors.note')
        <div class="row featured__filter">
        @if(isset($productsparent_id))

            @foreach($productsparent_id as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{'image/'.$product->product_img}}">
                            <img src="{{asset('image/'.$product->product_img)}}" class="featured__item__pic set-bg">
                            <ul class="featured__item__pic__hover">
                                <li><a href="{{route('get_product_detail', $product->id)}}"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">{{$product->product_name}}</a></h6>
                            <h5>{{number_format($product->price)}}{{ trans('message.vnd')}}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
        </div>
    </div>
</section>

@include('pages.components.footer')
