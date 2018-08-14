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

                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody><tr>
                            <th>Item ID</th>
                            <th>Item Name</th>
                            <th>Description</th>
                            <th>Specification</th>
                            <th>Unit</th>
                            <th>Danger Level</th>
                            <th>Type</th>
                            <th>Actions</th>
                        </tr>
                        <tr>
                            <td>123</td>
                            <td>Blue Wire Xyz</td>
                            <td>This is the description of the item</td>
                            <td>Material: something, color: blue</td>
                            <td>Centimeter</td>
                            <td><span class="label label-success">Flammable</span></td>
                            <td>Wire</td>
                            <td>
                                <a href="" class="btn btn-warning">Edit</a>
                                <button onclick="" class="btn btn-danger">Delete</button> <!-- only if no orders happened with this item -->
                                <form id="delete1" action="" method="post">
                                </form>
                            </td>
                        </tr>
                        </tbody></table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>

@stop