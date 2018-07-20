@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Performance</h1>

@stop

@section('content')

    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-aqua">
                <span class="info-box-icon"><i class="fa fa-bookmark-o"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Inventory</span>
                    <span class="info-box-number">41,410</span>

                    <div class="progress">
                        <div class="progress-bar" style="width: 0.5%"></div>
                    </div>
                    <span class="progress-description">
                    0.5% Increase in 30 Days
                  </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-green">
                <span class="info-box-icon"><i class="fa fa-shopping-cart"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Orders</span>
                    <span class="info-box-number">150</span>

                    <div class="progress">
                        <div class="progress-bar" style="width: 12%"></div>
                    </div>
                    <span class="progress-description">
                    12% Increase in 30 Days
                  </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-yellow">
                <span class="info-box-icon"><i class="fa fa-ship"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Shipments</span>
                    <span class="info-box-number">41</span>

                    <div class="progress">
                        <div class="progress-bar" style="width: 70%"></div>
                    </div>
                    <span class="progress-description">
                    70% Increase in 30 Days
                  </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-red">
                <span class="info-box-icon"><i class="fa fa-comments-o"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Items</span>
                    <span class="info-box-number">41,410</span>

                    <div class="progress">
                        <div class="progress-bar" style="width: 70%"></div>
                    </div>
                    <span class="progress-description">
                    70% Increase in 30 Days
                  </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-orange">
                <span class="info-box-icon"><i class="fa fa-bookmark-o"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Suppliers</span>
                    <span class="info-box-number">66</span>

                    <div class="progress">
                        <div class="progress-bar" style="width: 0.5%"></div>
                    </div>
                    <span class="progress-description">
                    0.5% Increase in 30 Days
                  </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-blue">
                <span class="info-box-icon"><i class="fa fa-thumbs-o-up"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Transactions</span>
                    <span class="info-box-number">1550</span>

                    <div class="progress">
                        <div class="progress-bar" style="width: 22%"></div>
                    </div>
                    <span class="progress-description">
                    22% Increase in 30 Days
                  </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-flag-o"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Latest Backup</span>
                    <span class="info-box-number">18 March 2019</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Inventory</h3>

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
                            <th>Current Quantity</th>
                            <th>Previous Quantity</th>
                            <th>Change %</th>
                        </tr>
                        <tr>
                            <td>153</td>
                            <td>Tobbaco Type F</td>
                            <td>11,455 tones</td>
                            <td>11,670 tones</td>
                            <td>+0.8%</td>
                        </tr>
                        <tr>
                            <td>153</td>
                            <td>Tobbaco Type F</td>
                            <td>11,455 tones</td>
                            <td>11,670 tones</td>
                            <td>+0.8%</td>
                        </tr>
                        <tr>
                            <td>153</td>
                            <td>Tobbaco Type F</td>
                            <td>11,455 tones</td>
                            <td>11,670 tones</td>
                            <td>+0.8%</td>
                        </tr>
                        <tr>
                            <td>153</td>
                            <td>Tobbaco Type F</td>
                            <td>11,455 tones</td>
                            <td>11,670 tones</td>
                            <td>+0.8%</td>
                        </tr>
                        </tbody></table>
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
                    <h3 class="box-title">Orders </h3>

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
                            <th>Current Orders</th>
                            <th>Previous Orders</th>
                            <th>Change %</th>
                        </tr>
                        <tr>
                            <td>153</td>
                            <td>Tobbaco Type F</td>
                            <td>12</td>
                            <td>12</td>
                            <td>+0.0%</td>
                        </tr>
                        <tr>
                            <td>153</td>
                            <td>Tobbaco Type F</td>
                            <td>11</td>
                            <td>12</td>
                            <td>+0.8%</td>
                        </tr>
                        <tr>
                            <td>153</td>
                            <td>Tobbaco Type F</td>
                            <td>11</td>
                            <td>12</td>
                            <td>+0.8%</td>
                        </tr>
                        <tr>
                            <td>153</td>
                            <td>Tobbaco Type F</td>
                            <td>11</td>
                            <td>12</td>
                            <td>+0.8%</td>
                        </tr>
                        </tbody></table>
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
                    <h3 class="box-title">Shipments</h3>

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
                            <th>Current Shipments</th>
                            <th>Previous Shipments</th>
                            <th>Change %</th>
                        </tr>
                        <tr>
                            <td>153</td>
                            <td>Tobbaco Type F</td>
                            <td>12</td>
                            <td>12</td>
                            <td>+0.0%</td>
                        </tr>
                        <tr>
                            <td>153</td>
                            <td>Tobbaco Type F</td>
                            <td>11</td>
                            <td>12</td>
                            <td>+0.8%</td>
                        </tr>
                        <tr>
                            <td>153</td>
                            <td>Tobbaco Type F</td>
                            <td>11</td>
                            <td>12</td>
                            <td>+0.8%</td>
                        </tr>
                        <tr>
                            <td>153</td>
                            <td>Tobbaco Type F</td>
                            <td>11</td>
                            <td>12</td>
                            <td>+0.8%</td>
                        </tr>
                        </tbody></table>
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
                    <h3 class="box-title">Transactions</h3>

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
                            <th>Current Transactions</th>
                            <th>Previous Transactions</th>
                            <th>Change %</th>
                        </tr>
                        <tr>
                            <td>153</td>
                            <td>Tobbaco Type F</td>
                            <td>12</td>
                            <td>12</td>
                            <td>+0.0%</td>
                        </tr>
                        <tr>
                            <td>153</td>
                            <td>Tobbaco Type F</td>
                            <td>11</td>
                            <td>12</td>
                            <td>+0.8%</td>
                        </tr>
                        <tr>
                            <td>153</td>
                            <td>Tobbaco Type F</td>
                            <td>11</td>
                            <td>12</td>
                            <td>+0.8%</td>
                        </tr>
                        <tr>
                            <td>153</td>
                            <td>Tobbaco Type F</td>
                            <td>11</td>
                            <td>12</td>
                            <td>+0.8%</td>
                        </tr>
                        </tbody></table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>

    </div>


@stop