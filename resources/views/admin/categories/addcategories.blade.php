@extends('admin.layout.master')
@section('title','Bán Bánh Bèo')
@section('content')
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-xs-4 col-sm-4">
                <div class="card">
                    <div class="card-header">
                        <strong>{{ trans('message.cate')}}</strong> <small>{{ trans('message.addcate')}}</small>
                    </div>
                    <div class="card-body card-block">
                        @include('errors.note')
                        <form method="post" action="{{asset('admin/categories')}}">
                            {{csrf_field()}}
                            <div class="form-group" action="{{asset('admin/categories')}}">
                                <label class=" form-control-label">{{ trans('message.catename')}}</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <input class="form-control" type="text" name="categories_name" required>
                                    </div>
                                <small class="form-text text-muted">ex. Sữa đổ vào trà.</small>
                            </div>
                            <label class=" form-control-label">{{ trans('message.parent')}}</label>
                            <select data-placeholder="Choose a Country..." class="standardSelect mt-3" tabindex="1" name="parent_id">
                                <option value="" label="Chọn Category"></option>
                                @foreach($catelist as $cate)
                                    <option value="{{$cate->id}}">{{$cate->categories_name}}</option>
                                @endforeach
                            </select>
                            <div class="form-group">
                                <input type="submit" name="submit" value="Add Category" class="btn btn-primary mt-5">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
                <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">{{ trans('message.cate')}}</strong>
            </div>
            <div class="card-body">
                <table class="table table-striped" >
                    <thead>
                        <tr>
                            <th scope="col">{{ trans('message.id')}}</th>
                            <th scope="col">{{ trans('message.categoriesname')}}</th>
                            <th scope="col">{{ trans('message.parentid')}}</th>
                            <th scope="col">{{ trans('message.Edit')}}</th>
                            <th scope="col">{{ trans('message.Delete')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($catelist as $cate)
                        <tr>
                            <th scope="row">{{$cate->id}}</th>
                            <td>{{$cate->categories_name}}</td>
                            <td>{{$cate->parent_id}}</td>
                            <td ><a href="{{asset('admin/categories/'.$cate->id.'/edit')}}"><input type="submit" name="submit" value="Edit" class="btn btn-primary" id="button"></a></td>
                            <form method="POST" action="{{asset('admin/categories/'.$cate->id)}}">
                                {{csrf_field()}}
                                @method('DELETE')
                                <td><input type="submit" name="submit" value="Delete" class="btn btn-primary" id="button"></td>
                            </form>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @if($catelist->hasPages())
                    {{ $catelist->links() }}
                @endif
            </div>
        </div>
    </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->

@stop
