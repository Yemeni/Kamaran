@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Orders</h1>
    <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Responsive Hover Table</h3>

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
                                <th>Order ID</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Letter of Credit</th>
                                <th>Approval date</th>
                                <th>Usesr</th>
                                <th>Suppliers</th>
                                <th>Category</th>
                                <th>Comment</th>
                            </tr>
                            <tr>
                                <td>183</td>
                                <td>Ahmed Ali</td>
                                <td>11-7-2018</td>
                                <td>11-7-2018</td>
                                <td>CIF</td>
                                <td><span class="label label-success">Approved</span></td>
                                <td>They will give 5% discount the next time we order</td>
                                <td>hi</td>
                                <td>They will give 5% discount the next time we order</td>
                            </tr>
                            <tr>
                                <td>219</td>
                                <td>Alexander Mohammed</td>
                                <td>11-7-2018</td>
                                <td>11-7-2018</td>
                                <td>CIF</td>
                                <td><span class="label label-warning">Pending</span></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>657</td>
                                <td>Ibtisam Doe</td>
                                <td>11-7-2018</td>
                                <td>11-7-2018</td>
                                <td>FOB</td>
                                <td><span class="label label-success">Approved</span></td>
                                <td>This is very necessary for the XVR machine</td>
                            </tr>
                            <tr>
                                <td>175</td>
                                <td>Fatimah Salah</td>
                                <td>11-7-2018</td>
                                <td>11-7-2018</td>
                                <td>CIF</td>
                                <td><span class="label label-danger">Cancelled</span></td>
                                <td></td>
                            </tr>
                            </tbody></table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
@stop

@section('content')

@stop
