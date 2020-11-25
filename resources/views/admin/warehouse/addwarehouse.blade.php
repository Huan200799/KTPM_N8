@extends('admin.layout.master')
@section('title','Bán Bánh Bèo')
@section('content')
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-xs-4 col-sm-4">
                <div class="card">
                    <div class="card-header">
                        <strong>WareHouse</strong> <small>Add WareHouse</small>
                    </div>
                    <div class="card-body card-block">
                        @include('errors.note')
                        <form method="post" action="{{asset('admin/warehouse')}}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label class=" form-control-label">Số Lượng</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <input class="form-control" type="text" name="total" required>
                                    </div>
                                <small class="form-text text-muted">ex. 10.</small>
                            </div>
                            <label class=" form-control-label">ID</label>
                            <select data-placeholder="Choose a Country..." class="standardSelect mt-3" tabindex="1" name="categories_id">
                                <option value="" label="Chọn Categories"></option>
                                @foreach($catelistparent as $cate)
                                    <option value="{{$cate->id}}">{{$cate->categories_name}}</option>
                                @endforeach
                            </select>
                            <div class="form-group">
                                <input type="submit" name="submit" value="Add WareHouse" class="btn btn-primary mt-5">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
                <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">List WareHouse</strong>
            </div>
            <div class="card-body">
                <table class="table table-striped" >
                    <thead>
                        <tr>
                            <th scope="col">{{ trans('message.id')}}</th>
                            <th scope="col">Total</th>
                            <th scope="col">ID Categories</th>
                            <th scope="col">Categories Name</th>
                            <th scope="col">{{ trans('message.Edit')}}</th>
                            <th scope="col">{{ trans('message.Delete')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($warehouses as $warehouse)
                        <tr>
                            <th scope="row">{{$warehouse->id}}</th>
                            <td>{{$warehouse->total}}</td>
                            <td>{{$warehouse->categories_id}}</td>
                            <td>{{$warehouse->categories_name}}</td>
                            <td ><a href="{{asset('admin/warehouse/'.$warehouse->id.'/edit')}}"><input type="submit" name="submit" value="Edit" class="btn btn-primary" id="button"></a></td>
                            <form method="POST" action="{{asset('admin/warehouse/'.$warehouse->id)}}">
                                {{csrf_field()}}
                                @method('DELETE')
                                <td><input type="submit" name="submit" value="Delete" class="btn btn-primary" id="button"></td>
                            </form>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @if($warehouses->hasPages())
                    {{ $warehouses->links() }}
                @endif
            </div>
        </div>
    </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->

@stop
