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
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="order-summary clearfix">
                <div class="section-title">
                    <h3 class="title">{{ trans('message.ordered')}}</h3>
                </div>
                <table class="shopping-cart-table table">
                    <thead>
                        <tr>
                            <th class="text-center">{{ trans('message.image')}}</th>
                            <th class="text-center">{{ trans('message.name')}}</th>
                            <th class="text-center">{{ trans('message.price')}}</th>
                            <th class="text-center">{{ trans('message.qty')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($history_product as $product)
                        <tr>
                            @if(Auth::user()->id == $product->user_id)
                            <td class="thumb text-center"><img src="{{'/image/'.$product->product_img}}" alt="error image" height="100px"></td>
                            <td class="details text-center">
                                <a href="#">{{$product->product_name}}</a>
                            </td>
                            <td class="price text-center"><strong>{{$product->price}}</strong></td>
                            <td class="price text-center"><strong>{{$product->quantity}}</strong></td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@include('pages.components.footer')

