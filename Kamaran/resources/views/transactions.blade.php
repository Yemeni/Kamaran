@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Transactions</h1>

@stop

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Latest Transactions</h3>

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
                            <th>Transaction ID</th>
                            <th>Transaction Type</th>
                            <th>Employee</th>
                            <th>Shipment ID</th>
                            <th>Date</th>
                            <th>Quantity</th>
                            <th>Comment</th>
                        </tr>
                        <tr>
                            <td><a href="">data</a></td>
                            <td>data</td>
                            <td><a href="">data</a></td>
                            <td><a href="">data</a></td>
                            <td>data</td>
                            <td><span class="label label-success">data</span></td>
                            <td>data</td>
                        </tr>
                        <tr>
                            <td>data</td>
                            <td>data</td>
                            <td>data</td>
                            <td>data</td>
                            <td>data</td>
                            <td><span class="label label-success">data</span></td>
                            <td>data</td>
                        </tr>
                        <tr>
                            <td>data</td>
                            <td>data</td>
                            <td>data</td>
                            <td>data</td>
                            <td>data</td>
                            <td><span class="label label-success">data</span></td>
                            <td>data</td>
                        </tr>
                        <tr>
                            <td>data</td>
                            <td>data</td>
                            <td>data</td>
                            <td>data</td>
                            <td>data</td>
                            <td><span class="label label-success">data</span></td>
                            <td>data</td>
                        </tr>
                        </tbody></table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>

@stop