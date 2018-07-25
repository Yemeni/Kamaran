@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Review Orders</h1>

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Pending Orders</h3>

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
                            <th>Staff</th>
                            <th>Date</th>
                            <th>Letter of Credit</th>
                            <th>Supplier</th>
                            <th>Comment</th>
                            <th></th>
                        </tr>
                        <tr>
                            <td>183</td>
                            <td>Ahmed Ali</td>
                            <td>11-7-2018</td>
                            <td>CIF</td>
                            <td>XYZ Limited</td>
                            <td>They will give 5% discount the next time we order</td>
                            <td><a href=""><i class="fa fa-fw fa-check "></i>Approve</a> <a href=""><i class="fa fa-fw fa-times "></i>Cancel</a> <a href=""><i class="fa fa-fw fa-sticky-note "></i>Other</a></td>
                        </tr>
                        <tr>
                            <td>183</td>
                            <td>Ahmed Ali</td>
                            <td>11-7-2018</td>
                            <td>CIF</td>
                            <td>XYZ Limited</td>
                            <td>They will give 5% discount the next time we order</td>
                            <td><a href=""><i class="fa fa-fw fa-check "></i>Approve</a> <a href=""><i class="fa fa-fw fa-times "></i>Cancel</a> <a href=""><i class="fa fa-fw fa-sticky-note "></i>Other</a></td>
                        </tr>
                        <tr>
                            <td>183</td>
                            <td>Ahmed Ali</td>
                            <td>11-7-2018</td>
                            <td>CIF</td>
                            <td>XYZ Limited</td>
                            <td>They will give 5% discount the next time we order</td>
                            <td><a href=""><i class="fa fa-fw fa-check "></i>Approve</a> <a href=""><i class="fa fa-fw fa-times "></i>Cancel</a> <a href=""><i class="fa fa-fw fa-sticky-note "></i>Other</a></td>
                        </tr>
                        <tr>
                            <td>183</td>
                            <td>Ahmed Ali</td>
                            <td>11-7-2018</td>
                            <td>CIF</td>
                            <td>XYZ Limited</td>
                            <td>They will give 5% discount the next time we order</td>
                            <td><a href=""><i class="fa fa-fw fa-check "></i>Approve</a> <a href=""><i class="fa fa-fw fa-times "></i>Cancel</a> <a href=""><i class="fa fa-fw fa-sticky-note "></i>Other</a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Cancelled/Other Orders</h3>

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
                            <th>Staff</th>
                            <th>Date</th>
                            <th>Letter of Credit</th>
                            <th>Supplier</th>
                            <th>Comment</th>
                        </tr>
                        <tr>
                            <td>183</td>
                            <td>Ahmed Ali</td>
                            <td>11-7-2018</td>
                            <td>CIF</td>
                            <td>XYZ Limited</td>
                            <td>They will give 5% discount the next time we order</td>
                        </tr>
                        <tr>
                            <td>183</td>
                            <td>Ahmed Ali</td>
                            <td>11-7-2018</td>
                            <td>CIF</td>
                            <td>XYZ Limited</td>
                            <td>They will give 5% discount the next time we order</td>
                        </tr>
                        <tr>
                            <td>183</td>
                            <td>Ahmed Ali</td>
                            <td>11-7-2018</td>
                            <td>CIF</td>
                            <td>XYZ Limited</td>
                            <td>They will give 5% discount the next time we order</td>
                        </tr>
                        <tr>
                            <td>183</td>
                            <td>Ahmed Ali</td>
                            <td>11-7-2018</td>
                            <td>CIF</td>
                            <td>XYZ Limited</td>
                            <td>They will give 5% discount the next time we order</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Approved Orders</h3>

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
                            <th>Staff</th>
                            <th>Date</th>
                            <th>Letter of Credit</th>
                            <th>Supplier</th>
                            <th>Approval Date</th>
                            <th>Comment</th>
                        </tr>
                        <tr>
                            <td>183</td>
                            <td>Ahmed Ali</td>
                            <td>11-7-2018</td>
                            <td>CIF</td>
                            <td>XYZ Limited</td>
                            <td>11-7-2018</td>
                            <td>They will give 5% discount the next time we order</td>
                        </tr>
                        <tr>
                            <td>183</td>
                            <td>Ahmed Ali</td>
                            <td>11-7-2018</td>
                            <td>CIF</td>
                            <td>XYZ Limited</td>
                            <td>11-7-2018</td>
                            <td>They will give 5% discount the next time we order</td>
                        </tr>
                        <tr>
                            <td>183</td>
                            <td>Ahmed Ali</td>
                            <td>11-7-2018</td>
                            <td>CIF</td>
                            <td>XYZ Limited</td>
                            <td>11-7-2018</td>
                            <td>They will give 5% discount the next time we order</td>
                        </tr>
                        <tr>
                            <td>183</td>
                            <td>Ahmed Ali</td>
                            <td>11-7-2018</td>
                            <td>CIF</td>
                            <td>XYZ Limited</td>
                            <td>11-7-2018</td>
                            <td>They will give 5% discount the next time we order</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
@stop

@section('content')

@stop