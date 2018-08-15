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
                    <table class="table table-hover datatables">
                        <thead>
                            <th>Transaction ID</th>
                            <th>Transaction Type</th>
                            <th>Employee</th>
                            <th>Shipment ID</th>
                            <th>Date</th>
                            <th>Quantity</th>
                            <th>Comment</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                        <tr>
                            <td>514</td>
                            <td>Vouchar</td>
                            <td>Ahmed Ali</td>
                            <td>563</td>
                            <td>2088-2-11</td>
                            <td>500000</td>
                            <td>Comment here</td>
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