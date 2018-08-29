@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Dashboard</h1>

@stop

@section('content')
    <p>You are logged in!</p>

    <div class="row">
        <div class="col-lg-2 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{ $pendingOrders }}</h3>

                    <p>Pending Orders</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="/review_orders" class="small-box-footer">More info
                    <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-2 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{ $pendingShipments }}</h3>

                    <p>Pending Shipments</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="/track_shipments" class="small-box-footer">More info
                    <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-2 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-purple">
                <div class="inner">
                    <h3>{{ $totalSuppliers }}</h3>

                    <p>Total Suppliers</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="/supplier" class="small-box-footer">More info
                    <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-2 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{ $totalItems }}</h3>

                    <p>Total Items</p>
                </div>
                <div class="icon">
                    <i class="ion ion-android-drafts"></i>
                </div>
                <a href="/item" class="small-box-footer">More info
                    <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->

        <!-- ./col -->
        <div class="col-lg-2 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>{{ $onHoldInventories }}</h3>

                    <p>On Hold Inventory</p>
                </div>
                <div class="icon">
                    <i class="ion ion-android-exit"></i>
                </div>
                <a href="/inventory" class="small-box-footer">More info
                    <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- .col -->
        <div class="col-lg-2 col-xs-6">
            <!-- small box -->
            <div class="box">
                <div class="inner">
                    <p align="center">Current Time</p>
                    <p align="center" id="date"></p>
                    <p align="center" id="time"></p>
                </div>

            </div>
        </div>
        <!-- ./col -->
    </div>

    <div class="row">
        <!-- ./col -->
        <div class="col-sm-12 col-md-{{ $tobacco ? '6' : '12' }}">
            <!-- small box -->
            <div class="small-box bg-blue">
                <div class="inner">

                    <h3>{{ \App\Order::all()->count() }}
                        <sup style="font-size: 20px">Orders</sup> {{ \App\Order::where('order_status','approved')->count() }}
                        <sup style="font-size: 20px">Approved</sup></h3>

                    <p>Total of {{ \App\Order::
                    whereDate('date', '=', date('2018-08-24'))
                    ->count() }} Orders made today ({{ \App\Order::where('order_status','approved')
                    ->whereDate('date', '=', date('2018-08-24'))
                    ->count() }} Approved)</p>
                    <p><br/></p>
                    <div class="bg-gray">
                        {!! $ordersChart->render() !!}
                    </div>
                </div>
                <a href="/review_orders" class="small-box-footer">More info
                    <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
        @if($tobacco)
            <div class="col-sm-12 col-md-6">
                <!-- small box -->
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3>Total Tobacco

                        {{ $currentTobacco }}
                            <sup style="font-size: 20px">{{ $tobaccoUnit }}</sup></h3>

                        <p>Last month you consumed {{ $consumedTobacco }} <sup style="font-size: 10px">{{ $tobaccoUnit }}</sup></p>
                        <p>Last month you ordered {{ $orderedTobacco }} <sup style="font-size: 10px">{{ $tobaccoUnit }}</sup></p>
                        <div class="bg-gray">
                            {!! $tobaccoChart->render() !!}
                        </div>
                    </div>
                    <a href="/inventory_balance" class="small-box-footer">More info
                        <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
    @endif
    <!-- ./col -->

    </div>

    <div class="row">
        @if($latestOrders->count())
            <div class="col-sm-12 col-md-8">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Latest Orders</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody>
                            <tr>
                                <th>Order ID</th>
                                <th>Item</th>
                                <th>Staff</th>
                                <th>Date</th>
                                <th>Letter</th>
                                <th>Status</th>
                                <th>Comment</th>
                            </tr>
                            @foreach($latestOrders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->item->name }}</td>
                                    <td>{{ $order->user->name }}</td>
                                    <td>{{ $order->date->format('d-m-Y') }}</td>
                                    <td>{{ $order->letter_of_credit }}</td>
                                    <td>
                                        <span class="label label-{{ $order->order_status == 'approved' ? 'success' : 'warning' }}">{{ $order->order_status }}</span>
                                    </td>
                                    <td>{{ $order->comment }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        @endif
        @if($latestInventories->count())
            <div class="col-sm-12 col-md-4">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Latest Transactions</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding text-black">
                        <table class="table table-hover">
                            <tbody>
                            <tr>
                                <th>Transaction ID</th>
                                <th>Item</th>
                                <th>Date</th>
                                <th>Type</th>
                                <th>Quantity</th>
                            </tr>
                            @foreach($latestInventories as $inventory)
                                <tr
                                        @switch($inventory->transaction_type)
                                            @case('voucher')
                                            @case('initial_balance')
                                            @case('surplus')
                                            class="success"
                                            @break

                                            @case('consume')
                                            @case('shortage')
                                            @case('normal_shortage')
                                            class="danger"
                                            @break

                                            @default
                                            class="info"
                                        @endswitch
                                >
                                    <td>{{ $inventory->id }}</td>
                                    <td>{{ $inventory->item->name }}</td>
                                    <td>{{ $inventory->date->format('d-m-Y') }}</td>
                                    <td>
                                        @switch($inventory->transaction_type)
                                        @case('voucher')
                                        In Stock
                                        @break

                                        @case('initial_balance')
                                        Initial Balance
                                        @break

                                        @case('surplus')
                                        Surplus
                                        @break

                                        @case('consume')
                                        Consume
                                        @break

                                        @case('shortage')
                                        Shortage
                                        @break

                                        @case('normal_shortage')
                                        Normal Shortage
                                        @break

                                        @default
                                        Undefined
                                        @endswitch
                                    </td>
                                    <td>{{ $inventory->quantity }} {{ $inventory->item->unit }}</td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
    @endif
    <!-- ./col -->
    </div>


@stop