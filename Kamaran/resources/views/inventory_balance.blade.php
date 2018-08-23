@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Inventory</h1>

@stop

@section('content')

    <p>You are logged in!</p>

    <div class="row">
        <div class="col-lg-2 col-xs-2">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>80</h3>

                        <p>Shipping</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            <!-- ./col -->
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>53</h3>

                        <p>Orderes</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
        </div>

        <div class="col-lg-10 col-xs-6 ">

            <div class="row">
                <div class="col-lg-6 col-xs-6">
                    <p class="text">Item Name</p>
                </div>

                <div class="col-lg-2 col-xs-2">
                    <p class="bg-green" style="text-align: center;">Current</p>
                </div>

                <div class="col-lg-2 col-xs-2">
                    <p class="bg-yellow" style="text-align: center;">Shipping</p>
                </div>

                <div class="col-lg-2 col-xs-2">
                    <p class="bg-red" style="text-align: center;">Ordering</p>
                </div>
            </div>

            @foreach($itemNames as $itemName)
                <div class="row">
                    <div class="col-lg-6 col-xs-6">
                        <p>
                            {{ $itemName }}
                        </p>
                    </div>

                    <div class="col-lg-6 col-xs-6">

                        <div class="progress" style="border-radius: 10px">
                            <div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="{{ $percentage[$itemName]['currentInventory'] }}" aria-valuemin="10" aria-valuemax="100" style="width: {{ $percentage[$itemName]['currentInventory'] }}%">
                                {{ $balance[$itemName]['currentInventory'] }}
                            </div>
                            <div class="progress-bar progress-bar-yellow" role="progressbar" aria-valuenow="{{ $percentage[$itemName]['currentShipping'] }}" aria-valuemin="10" aria-valuemax="100" style="width: {{ $percentage[$itemName]['currentShipping'] }}%">
                                {{ $balance[$itemName]['currentShipping'] }}
                            </div>
                            <div class="progress-bar progress-bar-red" role="progressbar" aria-valuenow="{{ $percentage[$itemName]['currentOrdered'] }}" aria-valuemin="10" aria-valuemax="100" style="width: {{ $percentage[$itemName]['currentOrdered'] }}%">
                                {{ $balance[$itemName]['currentOrdered'] }}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Detailed inventory</h3>

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
                            <tr>
                                <th>Item ID</th>
                                <th>Item Name</th>
                                <th>Current Quantity</th>
                                <th>Shipping Quantity</th>
                                <th>Ordering Quantity</th>
                                <th>Consumption This Month</th>
                                <th>Consumption Last Month</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>186</td>
                                <td>Tobbaco Type F</td>
                                <td>11,455 tones</td>
                                <td>2,000 tones</td>
                                <td>2,559 tones</td>
                                <td>2,5559 tones</td>
                                <td>2,800 tones</td>
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