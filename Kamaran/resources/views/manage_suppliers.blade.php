@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Manage Suppliers</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Suppliers</h3>

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
                    <table class="table table-hover datatables">
                        <thead>
                            <th>Supplier ID</th>
                            <th>Supplier Name</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                        <tr>
                            <td>154</td>
                            <td>Motors Limited .co</td>
                            <td>China, Beijing</td>
                            <td>+967 777 777 777</td>
                            <td>sales@chinaXyz.cn</td>
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