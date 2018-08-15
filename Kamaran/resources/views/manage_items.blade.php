@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Manage Items</h1>

@stop

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Items</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table class="table table-hover datatables">
                        <thead>
                        <tr>
                            <th>Item ID</th>
                            <th>Item Name</th>
                            <th>Description</th>
                            <th>Specification</th>
                            <th>Unit</th>
                            <th>Danger Level</th>
                            <th>Type</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($items as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->specification }}</td>
                                <td>{{ $item->unit }}</td>
                                <td>
                                    <span class="label label-success">{{ $item->danger_level }}</span>
                                </td>
                                <td>{{ $item->type }}</td>
                                <td>
                                    <a href="{{ url('/item/'.$item->id.'/edit') }}" class="btn btn-warning">Edit</a>
                                    <a href="{{ url('/item/'.$item->id) }}" class="btn btn-danger">Delete</a>
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