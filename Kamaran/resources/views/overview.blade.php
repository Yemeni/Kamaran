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
                <a href="/track_Shipment" class="small-box-footer">More info
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
                    <p>Today is Tuesday,</p>
                    <p>22 March 2019</p>
                    <p>8:31 AM</p>
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

                    <p>You have made 3 Orders today (2 Approved)</p>
                    <div class="bg-gray">

                            {{--<script>--}}
                                {{--var ctx = document.getElementById("myChart");--}}
                                {{--var myChart = new Chart(ctx, {--}}
                                    {{--type: 'line',--}}
                                    {{--data: {--}}
                                        {{--labels: ["January", "February", "March", "April", "May", "June", "July", "August", "september"],--}}
                                        {{--datasets: [--}}
                                            {{--{--}}
                                                {{--data: [0, 0, 0, 0, 0, 0, 0, {{ \App\Order::where('order_status','approved')->count() }}, 0, 0],--}}
                                                {{--backgroundColor: '#3498db',--}}
                                                {{--borderColor: 'rgba(136,136,136,0.5)',--}}
                                                {{--pointBackgroundColor: '#3498db',--}}
                                                {{--pointBorderColor: '#fff',--}}
                                                {{--label: "Approved Orders"--}}
                                            {{--},--}}

                                            {{--{--}}
                                                {{--data: [0, 0, 0, 0, 0, 0, 0, {{ \App\Order::all()->count() }}, 0, 0],--}}
                                                {{--backgroundColor: '#2ecccc',--}}
                                                {{--borderColor: '#aaaaaa',--}}
                                                {{--pointBackgroundColor: '#6d2ecc',--}}
                                                {{--pointBorderColor: '#fff',--}}
                                                {{--label: "Total Orders"--}}
                                            {{--},--}}

                                        {{--]--}}
                                    {{--},--}}
                                    {{--options: {--}}
                                        {{--responsive: true,--}}
                                        {{--layout: {padding: {top: 12, left: 12, bottom: 12,},},--}}
                                        {{--scales: {--}}
                                            {{--xAxes: [{--}}
                                                {{--stacked: true, gridLines: {borderDash: [],},--}}
                                            {{--}],--}}

                                            {{--yAxes: [{--}}
                                                {{--stacked: true, gridLines: {borderDash: [],},--}}
                                            {{--}],--}}
                                        {{--}, plugins: {--}}
                                            {{--datalabels: {--}}
                                                {{--display: true,--}}
                                                {{--font: {--}}
                                                    {{--style: ' bold',--}}
                                                {{--},--}}
                                            {{--},--}}
                                        {{--},--}}
                                        {{--legend: {--}}
                                            {{--labels: {--}}
                                                {{--generateLabels: function (chart) {--}}
                                                    {{--return chart.data.datasets.map(function (dataset, i) {--}}
                                                        {{--return {--}}
                                                            {{--text: dataset.label,--}}
                                                            {{--lineCap: dataset.borderCapStyle,--}}
                                                            {{--lineDash: [],--}}
                                                            {{--lineDashOffset: 0,--}}
                                                            {{--lineJoin: dataset.borderJoinStyle,--}}
                                                            {{--fillStyle: dataset.backgroundColor,--}}
                                                            {{--strokeStyle: dataset.borderColor,--}}
                                                            {{--lineWidth: dataset.pointBorderWidth,--}}
                                                            {{--lineDash: dataset.borderDash,--}}
                                                        {{--}--}}
                                                    {{--})--}}
                                                {{--},--}}

                                            {{--},--}}
                                        {{--},--}}

                                        {{--title: {--}}
                                            {{--display: true,--}}
                                            {{--text: 'Total Orders',--}}
                                            {{--fontColor: '#3498db',--}}
                                            {{--fontSize: 32,--}}
                                            {{--fontStyle: ' bold',--}}
                                        {{--},--}}
                                        {{--elements: {--}}
                                            {{--arc: {},--}}
                                            {{--point: {},--}}
                                            {{--line: {--}}
                                                {{--tension: 0.4,--}}
                                            {{--},--}}
                                            {{--rectangle: {},--}}
                                        {{--},--}}
                                        {{--tooltips: {},--}}
                                        {{--hover: {--}}
                                            {{--mode: 'nearest',--}}
                                            {{--animationDuration: 400,--}}
                                        {{--},--}}
                                    {{--}--}}
                                {{--});--}}
                            {{--</script>--}}
                        {{--@append--}}
                    {!! $ordersChart->render() !!}
                    </div>
                </div>
                <a href="#" class="small-box-footer">More info
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
                        <h3>Total Tobacco</h3>

                        <h3>{{ \App\Item::where('name', 'tobacco')->first()->inventoryBalance(false) }} <sup style="font-size: 20px">tons</sup></h3>

                        <p>Last month you consumed {{ $consumedTobacco }} tons</p>
                        <p>Last month you ordered {{ $orderedTobacco }} tons</p>
                        <div class="bg-gray">
                            {!! $tobaccoChart->render() !!}
                            {{--<canvas id="myChart2" width="700" height="400" class="bg-gray"></canvas>--}}
                            {{--@section('js')--}}

                                {{--<script>--}}
                                    {{--var ctx2 = document.getElementById("myChart2");--}}
                                    {{--var myChart2 = new Chart(ctx2, {--}}
                                        {{--type: 'bar',--}}
                                        {{--data: {--}}
                                            {{--labels: ["January", "February", "March", "April", "May", "June", "July",],--}}
                                            {{--datasets: [--}}
                                                {{--{--}}
                                                    {{--data: [650545111, 80545111, 900545111, 805451111, 505451116, 505451115, 154511140,],--}}
                                                    {{--backgroundColor: '#3498db',--}}
                                                    {{--borderColor: 'rgba(136,136,136,0.5)',--}}
                                                    {{--pointBackgroundColor: '#3498db',--}}
                                                    {{--pointBorderColor: '#fff',--}}
                                                    {{--label: "Tobacco Consumed"--}}
                                                {{--},--}}

                                                {{--{--}}
                                                    {{--data: [705451117, 480545111, 905451119, 805451118, 905451116, 605451116, 1005451110,],--}}
                                                    {{--backgroundColor: '#2ecccc',--}}
                                                    {{--borderColor: '#aaaaaa',--}}
                                                    {{--pointBackgroundColor: '#6d2ecc',--}}
                                                    {{--pointBorderColor: '#fff',--}}
                                                    {{--label: "Tobacco Ordered"--}}
                                                {{--},--}}

                                            {{--]--}}
                                        {{--},--}}
                                        {{--options: {--}}
                                            {{--responsive: true,--}}
                                            {{--layout: {padding: {top: 12, left: 12, bottom: 12,},},--}}
                                            {{--scales: {--}}
                                                {{--xAxes: [{--}}
                                                    {{--stacked: true, gridLines: {borderDash: [],},--}}
                                                {{--}],--}}

                                                {{--yAxes: [{--}}
                                                    {{--stacked: true, gridLines: {borderDash: [],},--}}
                                                {{--}],--}}
                                            {{--}, plugins: {--}}
                                                {{--datalabels: {--}}
                                                    {{--display: true,--}}
                                                    {{--font: {--}}
                                                        {{--style: ' bold',--}}
                                                    {{--},--}}
                                                {{--},--}}
                                            {{--},--}}
                                            {{--legend: {--}}
                                                {{--labels: {--}}
                                                    {{--generateLabels: function (chart) {--}}
                                                        {{--return chart.data.datasets.map(function (dataset, i) {--}}
                                                            {{--return {--}}
                                                                {{--text: dataset.label,--}}
                                                                {{--lineCap: dataset.borderCapStyle,--}}
                                                                {{--lineDash: [],--}}
                                                                {{--lineDashOffset: 0,--}}
                                                                {{--lineJoin: dataset.borderJoinStyle,--}}
                                                                {{--fillStyle: dataset.backgroundColor,--}}
                                                                {{--strokeStyle: dataset.borderColor,--}}
                                                                {{--lineWidth: dataset.pointBorderWidth,--}}
                                                                {{--lineDash: dataset.borderDash,--}}
                                                            {{--}--}}
                                                        {{--})--}}
                                                    {{--},--}}

                                                {{--},--}}
                                            {{--},--}}

                                            {{--title: {--}}
                                                {{--display: true,--}}
                                                {{--text: 'Total Tobacco',--}}
                                                {{--fontColor: '#3498db',--}}
                                                {{--fontSize: 32,--}}
                                                {{--fontStyle: ' bold',--}}
                                            {{--},--}}
                                            {{--elements: {--}}
                                                {{--arc: {},--}}
                                                {{--point: {},--}}
                                                {{--line: {--}}
                                                    {{--tension: 0.4,--}}
                                                {{--},--}}
                                                {{--rectangle: {},--}}
                                            {{--},--}}
                                            {{--tooltips: {},--}}
                                            {{--hover: {--}}
                                                {{--mode: 'nearest',--}}
                                                {{--animationDuration: 400,--}}
                                            {{--},--}}
                                        {{--}--}}
                                    {{--});--}}
                                {{--</script>--}}
                            {{--@append--}}
                        </div>
                    </div>
                    <a href="#" class="small-box-footer">More info
                        <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
    @endif
    <!-- ./col -->

    </div>

    <div class="row">
        @if($latestOrders->count())
            <div class="col-xs-8">
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
                                    <td>They will give 5% discount the next time we order</td>
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
            <div class="col-sm-4 col-md-4">
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
                                <tr>
                                    <td>{{ $inventory->id }}</td>
                                    <td>{{ $inventory->item->name }}</td>
                                    <td>{{ $inventory->date->format('d-m-Y') }}</td>
                                    <td>{{ $inventory->transaction_type }}</td>
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