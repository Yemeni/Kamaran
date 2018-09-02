@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Inventory</h1>

@stop

@section('content')

    <p>You are logged in!</p>

    <div class="row">
        <div class="col-lg-4 col-md-12 col-xs-12">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3>{{ $shipmentsCount['on_Hold'] }}</h3>
                                <p>On Hold Shipments</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-help-circled"></i>
                            </div>
                        </div>
                    <!-- ./col -->
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3>{{ $shipmentsCount['moving'] }}</h3>
                                <p>Moving Shipments</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-fw fa-ship "></i>
                            </div>
                        </div>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>{{ $shipmentsCount['delayed'] }}</h3>
                            <p>Delayed Shipments</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-clock"></i>
                        </div>
                    </div>
                    <!-- ./col -->
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>{{ $shipmentsCount['cancelled'] }}</h3>
                            <p>Cancelled Shipments</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-close-circled"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-xs-12">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>{{ $shipmentsCount['arrived'] }}</h3>
                            <p>Total Arrived Shipments</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-checkmark-circled"></i>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-lg-8 col-xs-12">

            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <p class="text text-bold">Item Name</p>
                </div>

                <div class="col-lg-3 col-xs-2">
                    <p class="bg-green" style="text-align: center;">Current</p>
                </div>

                <div class="col-lg-3 col-xs-2">
                    <p class="bg-yellow" style="text-align: center;">Shipping</p>
                </div>

                <div class="col-lg-3 col-xs-2">
                    <p class="bg-red" style="text-align: center;">Ordering</p>
                </div>
            </div>

            @foreach($items as $item)
                @if($item['important'])
                <div class="row">
                    <div class="col-lg-3 col-xs-6">
                        <p>
                            {{ $item['name'] }}
                        </p>
                    </div>

                    <div class="col-lg-9 col-xs-6">

                        <div class="progress" style="border-radius: 10px">
                            <div class="progress-bar progress-bar-green" role="progressbar" aria-valuenow="{{ $percentage[$item['id']]['currentInventory'] }}" aria-valuemin="10" aria-valuemax="100" style="width: {{ $percentage[$item['id']]['currentInventory'] }}%">
                                {{ $balance[$item['id']]['currentInventory'] }}
                            </div>
                            <div class="progress-bar progress-bar-yellow" role="progressbar" aria-valuenow="{{ $percentage[$item['id']]['currentShipping'] }}" aria-valuemin="10" aria-valuemax="100" style="width: {{ $percentage[$item['id']]['currentShipping'] }}%">
                                {{ $balance[$item['id']]['currentShipping'] }}
                            </div>
                            <div class="progress-bar progress-bar-red" role="progressbar" aria-valuenow="{{ $percentage[$item['id']]['currentOrdered'] }}" aria-valuemin="10" aria-valuemax="100" style="width: {{ $percentage[$item['id']]['currentOrdered'] }}%">
                                {{ $balance[$item['id']]['currentOrdered'] }}
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach

        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Detailed inventory</h3>
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
                        @foreach($items as $item)
                            <tr>
                                <td>{{ $item['id'] }}</td>
                                <td>{{ $item['name'] }}</td>
                                <td>{{ $balance[$item['id']]['currentInventory'] }}</td>
                                <td>{{ $balance[$item['id']]['currentShipping'] }}</td>
                                <td>{{ $balance[$item['id']]['currentOrdered'] }}</td>
                                <td>{{ $consumption[$item['id']]['consumptionThisMonth'] }}</td>
                                <td>{{ $consumption[$item['id']]['consumptionLastMonth'] }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>






@stop