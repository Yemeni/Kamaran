@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Shipments</h1>

@stop

@section('content')
    <p>You are logged in!</p>

    <div class="row">
        <div class="col-lg-2 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>80</h3>

                    <p>Arrived Shipments</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-2 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>53</h3>

                    <p>Moving Shipments</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-6 col-xs-6"></div>
        <!-- ./col -->
        <div class="col-lg-2 col-xs-6">
            <div class="form-group">
                <label for="">From Date:</label>
                <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" id="datepicker">
                </div>
            </div>
            <div class="form-group">
                <label for="">To Date:</label>
                <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" id="datepicker">
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Shipments Table</h3>

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
                            <th>Approval Date</th>
                            <th>Letter</th>
                            <th>Status</th>
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
    </div>


@stop