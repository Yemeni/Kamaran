@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Manage Items</h1>

@stop

@section('content')

    <div class="row">
        <div class="col-xs-12">
            @alert
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
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($items as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->description ?? '-' }}</td>
                                <td>{{ $item->specification ?? '-' }}</td>
                                <td>{{ $item->unit }}</td>
                                <td>
                                    @switch($item->danger_level)
                                        @case('low')
                                            <span class="label label-success">C- Low Priority</span>
                                        @break

                                        @case('flammable')
                                            <span class="label label-warning">B- Normal Priority</span>
                                        @break

                                        @case('toxic')
                                            <span class="label label-danger">A- High Priority</span>
                                        @break

                                        @default
                                        Undefined
                                    @endswitch
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown">Options
                                            <span class="caret"></span></button>
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li>
                                                <a href="{{ url('/item/'.$item->id.'/edit') }}">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ url('/item/'.$item->id) }}">
                                                    <i class="fa fa-trash"></i>Delete
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
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