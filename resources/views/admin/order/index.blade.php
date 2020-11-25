@extends('admin.layout.master')
@section('title','Bán Bánh Bèo')
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">{{ trans('message.manageorder')}}</strong>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">{{ trans('message.id')}}</th>
                            <th scope="col">{{ trans('message.username')}}</th>
                            <th scope="col">{{ trans('message.total_price')}}</th>
                            <th scope="col">{{ trans('message.status')}}</th>
                            <th scope="col">{{ trans('message.action')}}</th>
                            <th scope="col">{{ trans('message.action')}}</th>
                            </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <form method="post" action="{{asset('admin/order/'.$order->id)}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            @method('PUT')
                            <th scope="row">{{$order->id}}</th>
                            <td>{{$order->user_id}}</td>
                            <td>{{$order->total_price}}</td>
                            <td scope="row">
                            @if($order->status == 'Ordered')
                                {{ 'Ordere' }}
                            @endif
                            @if($order->status == 'Being transported')
                                {{ 'Being transported' }}
                            @endif
                            </td>
                            <input type="text" name="email" value="{{$order->email}}" hidden>
                            @if($order->status == 'Ordered')
                                <td ><a href=""><input type="submit" name="submit" value="Accept" class="btn btn-primary" id="button"></a></td>
                            @else
                                <td class="btn btn-danger mt-2">Watched</td>
                            @endif
                            </form>
                            <form method="POST" action="{{asset('admin/order/'.$order->id)}}">
                                {{csrf_field()}}
                                @method('DELETE')
                                <td><input type="submit" name="submit" value="Delete" class="btn btn-danger" id="button"></td>
                            </form>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @if($orders->hasPages())
                    {{ $orders->links() }}
                @endif
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        @include('errors.note')
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Manage Order Detail</strong>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">{{ trans('message.id')}}</th>
                            <th scope="col">Order ID</th>
                            <th scope="col">Product ID</th>
                            <th scope="col">{{ trans('message.price')}}</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Categories ID</th>
                            <th scope="col">Status</th>
                            <th scope="col">Xuất Kho</th>
                            </tr>
                    </thead>
                    <tbody>
                    @foreach($orderdetails as $orderdetail)
                        <tr>
                            <td>{{$orderdetail->id}}</td>
                            <td>{{$orderdetail->order_id}}</td>
                            <td>{{$orderdetail->product_id}}</td>
                            <td>{{$orderdetail->order_product_name}}</td>
                            <td>{{$orderdetail->order_product_totalprice}}</td>
                            <td>{{$orderdetail->quantity}}</td>
                            <td>{{$orderdetail->categories_id}}</td>
                            <td>{{$orderdetail->status}}</td>
                            @foreach($warehouses as $warehouse)
                                @if($warehouse->categories_id == $orderdetail->categories_id)
                                    <form method="post" action="{{asset('admin/exportwarehouse/'.$warehouse->id)}}">
                                        {{csrf_field()}}
                                        @method('PUT')
                                        <input type="text" name="quantity" value="{{$orderdetail->quantity}}" hidden>
                                        <input type="text" name="total" value="{{$warehouse->total}}" hidden>
                                        <input type="text" name="idorder" value="{{$orderdetail->id}}" hidden>
                                        @if($orderdetail->status == '')
                                        <td ><a href=""><input type="submit" name="submit" value="Xuất Kho" class="btn btn-primary"></a></td>
                                        @else
                                        <td class="btn btn-danger">Đã Xuất Kho</td>
                                        @endif
                                    </form>
                                @endif
                            @endforeach
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @if($orderdetails->hasPages())
                    {{ $orderdetails->links() }}
                @endif
            </div>
        </div>
    </div>
@stop
