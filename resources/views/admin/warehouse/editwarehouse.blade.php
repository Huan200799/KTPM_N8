@extends('admin.layout.master')
@section('title','Bán Bánh Bèo')
@section('content')
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-xs-9 col-sm-9">
                <div class="card">
                    <div class="card-header">
                        <strong>WareHouse</strong> <small>Edit WareHouse</small>
                    </div>
                    <div class="card-body card-block">
                        @include('errors.note')
                        <form method="post" action="{{asset('admin/warehouse/'.$warehouses->id)}}">
                            {{csrf_field()}}
                            @method('PUT')
                            <div class="form-group">
                                <label class=" form-control-label">Số Lượng</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <input class="form-control" type="text" name="total" value="{{$warehouses->total}}" required>
                                    </div>
                                <small class="form-text text-muted">ex. 10.</small>
                            </div>
                            <label class=" form-control-label">{{ trans('message.id')}}</label>
                            <select data-placeholder="Choose a Country..." class="standardSelect mt-3" tabindex="1" name="categories_id">
                                    <option value="{{$warehouses->categories_id}}">{{$warehouses->categories_id}}</option>
                                    @foreach ($catelistparent as $cate)
                                        @if($warehouses->categories_id != $cate->id)
                                        <option value="{{$cate->id}}">{{$cate->categories_name}}</option>
                                        @endif
                                    @endforeach
                            </select>
                            <div class="form-group">
                                <input type="submit" name="submit" value="Edit WareHouse" class="btn btn-primary mt-5">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->
@stop
