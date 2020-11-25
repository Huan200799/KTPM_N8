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
@if(isset($products))
    @foreach($products as $product)
    @endforeach
@endif
<div class="container">
    <div class="card">
        <div class="container-fliud">
            <div class="wrapper row">
                <div class="preview col-md-6">
                    <img src="{{'/image/'.$product->product_img}}" alt="error image">
                </div>
                <div class="details col-md-6">
                    <h3 class="product-title">{{$product->product_name}}</h3>
                    <div class="rating">
                        <div class="stars">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                        <span class="review-no">{{ trans('message.totalreview')}}</span>
                    </div>
                    <p class="product-description">{{$product->description}}</p>
                    <h4 class="price">{{ trans('message.currentprice')}}Current price: <span>{{$product->price}}{{ trans('message.vnd')}}</span></h4>
                    <form action="{{route('cart')}}" method="post">
                        {{csrf_field()}}
                        <div class="product-btns">
                            <div class="qty-input">

                                <input name="quantity" class="input" type="number" min="1" value="1" hidden>
                                <input name="product_id_hidden" class="input" type="hidden"  value="{{$product->id}}">
                            </div>
                            <button type="submit" class="primary-btn add-to-cart mt-5"><i class="fa fa-shopping-cart"></i> {{ trans('message.addtocart')}}</button>

                        </div>
                    </form>
                    <?php
                        $sumcomment = DB::table('favorite')->where('user_id', Auth::user()->id)->where('product_id', $product->id)->get();
                    ?>
                    @if(count($sumcomment) != 0)
                    @foreach($favorites as $favorite)
                    @if($favorite->product_id == $product->id)
                    <form method="post" action="{{asset('favorite/'.$favorite->id)}}">
                        {{csrf_field()}}
                        @method('DELETE')
                        @guest
                        @else
                        <button type="submit" class="btn btn-danger mt-3" style="width: 180px; height: 37px;"><i class="fa fa-heart"></i></button>
                        @endguest
                    </form>
                    @endif
                    @endforeach
                    @endif
                    @if(count($sumcomment) == 0)
                    <form method="post" action="{{asset('favorite/'.$product->id)}}">
                        {{csrf_field()}}
                        @method('PUT')
                        @guest
                        @else
                        <button type="submit" class="btn btn-primary mt-3" style="width: 180px; height: 37px;"><i class="fa fa-heart"></i></button>
                        @endguest
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@include('pages.components.footer')
