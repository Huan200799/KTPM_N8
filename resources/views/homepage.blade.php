@extends('pages.layout.master')
@section('content')
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="featured__controls">
                    <ul>
                        <li class="active" data-filter="*">{{ trans('message.drink')}}</li>
                    </ul>
                </div>
            </div>
        </div>
         @include('errors.note')
        <div class="row featured__filter">
        @if(isset($productdrink))

            @foreach($productdrink as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{'image/'.$product->product_img}}">
                            <ul class="featured__item__pic__hover">
                                @guest
                                @else
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
                                    <button type="submit" class="btn btn-danger mt-3"><i class="fa fa-heart"></i></button>
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
                                    <button type="submit" class="btn btn-primary mt-3"><i class="fa fa-heart"></i></button>
                                    @endguest
                                </form>
                                @endif
                                @endguest
                                <li><a href="{{route('get_product_detail', $product->id)}}"><i class="fa fa-retweet"></i></a></li>
                                <li><a href=""><i class="fa fa-shopping-cart"></i></a></li>
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
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="featured__controls">
                    <ul>
                        <li class="active" data-filter="*">{{ trans('message.food')}}</li>
                    </ul>
                </div>
            </div>
        </div>
         @include('errors.note')
        <div class="row featured__filter">
        @if(isset($productfood))

            @foreach($productfood as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{'image/'.$product->product_img}}">
                            <ul class="featured__item__pic__hover">
                                @guest
                                @else
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
                                    <button type="submit" class="btn btn-danger mt-3"><i class="fa fa-heart"></i></button>
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
                                    <button type="submit" class="btn btn-primary mt-3"><i class="fa fa-heart"></i></button>
                                    @endguest
                                </form>
                                @endif
                                @endguest
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

@stop

