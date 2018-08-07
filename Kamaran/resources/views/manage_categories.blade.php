@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Manage Categories</h1>

@stop

@section('content')

    <div class="row">
        <div class="col-xs-12">
            @alert
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Categories</h3>

                    {{--<div class="box-tools">--}}
                        {{--<div class="input-group input-group-sm" style="width: 150px;">--}}
                            {{--<input type="text" name="table_search" class="form-control pull-right" placeholder="Search">--}}

                            {{--<div class="input-group-btn">--}}
                                {{--<button type="submit" class="btn btn-default">--}}
                                    {{--<i class="fa fa-search"></i>--}}
                                {{--</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table class="table table-hover datatables">
                        <thead>
                        <tr>
                            <th>Category ID</th>
                            <th>Category Name</th>
                            <th>Description</th>
                            <th>Manager</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->comment ?? 'null' }}</td>
                                <td>{{ $category->managerUser()->name ?? 'null' }}</td>
                                <td>
                                    <a href="{{ url('/category/'.$category->id.'/edit') }}" class="btn btn-warning">Edit</a>
                                    <button onclick="if(confirm('do you really want to delete the {{ $category->name }}?')){$('#delete{{ $category->id }}').submit();return false;}" class="btn btn-danger">Delete</button>
                                    <form id="delete{{ $category->id }}" action="{{ url('/category/'.$category->id) }}" method="post">
                                        @csrf
                                        @method("DELETE")
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>

@stop