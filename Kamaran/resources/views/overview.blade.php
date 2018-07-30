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
                    <h3>80</h3>

                    <p>Pending Orders</p>
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
        <!-- ./col -->
        <div class="col-lg-2 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>12</h3>

                    <p>New Items</p>
                </div>
                <div class="icon">
                    <i class="ion ion-android-drafts"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-2 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-purple">
                <div class="inner">
                    <h3>8</h3>

                    <p>New Suppliers</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-2 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>33</h3>

                    <p>New Transactions</p>
                </div>
                <div class="icon">
                    <i class="ion ion-android-exit"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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
        <div class="col-sm-12 col-md-6">
            <!-- small box -->
            <div class="small-box bg-blue">
                <div class="inner">
                    <h3>2/4 Quarter Orders</h3>

                    <h3>53 <sup style="font-size: 20px">Orders</sup> 41 <sup style="font-size: 20px">Approved</sup></h3>

                    <p>You have made 3 Orders today (2 Approved)</p>
                    <div>
                        <canvas id="myChart" width="700" height="400" class="bg-gray"></canvas>
                        @section('js')

                            <script>
                                var ctx = document.getElementById("myChart");
                                var myChart = new Chart(ctx, {
                                    type: 'line',
                                    data: {
                                        labels : ["January","February","March","April","May","June","July",],
                                        datasets : [
                                            {
                                                data : [65,8,90,81,56,55,40,],
                                                backgroundColor :'#3498db',
                                                borderColor : 'rgba(136,136,136,0.5)',
                                                pointBackgroundColor:'#3498db',
                                                pointBorderColor : '#fff',
                                                label:"Approved Orders"},

                                            {
                                                data : [77,48,99,88,96,66,100,],
                                                backgroundColor :'#2ecccc',
                                                borderColor : '#aaaaaa',
                                                pointBackgroundColor:'#6d2ecc',
                                                pointBorderColor : '#fff',
                                                label:"Total Orders"},

                                        ]
                                    },
                                    options: {
                                        responsive:true,
                                        layout:{padding:{top:12,left:12,bottom:12,},},
                                        scales: {
                                            xAxes:[{
                                                stacked: true,gridLines:{borderDash:[],},
                                            }],

                                            yAxes:[{
                                                stacked: true,gridLines:{borderDash:[],},
                                            }],
                                        },plugins:{
                                            datalabels:{display:true,
                                                font:{
                                                    style:' bold',},},
                                        },
                                        legend:{
                                            labels:{
                                                generateLabels: function(chart){
                                                    return  chart.data.datasets.map( function( dataset, i ){
                                                        return{
                                                            text:dataset.label,
                                                            lineCap:dataset.borderCapStyle,
                                                            lineDash:[],
                                                            lineDashOffset: 0,
                                                            lineJoin:dataset.borderJoinStyle,
                                                            fillStyle:dataset.backgroundColor,
                                                            strokeStyle:dataset.borderColor,
                                                            lineWidth:dataset.pointBorderWidth,
                                                            lineDash:dataset.borderDash,
                                                        }
                                                    })
                                                },

                                            },
                                        },

                                        title:{
                                            display:true,
                                            text:'Total Orders',
                                            fontColor:'#3498db',
                                            fontSize:32,
                                            fontStyle:' bold',
                                        },
                                        elements: {
                                            arc: {
                                            },
                                            point: {},
                                            line: {tension:0.4,
                                            },
                                            rectangle: {
                                            },
                                        },
                                        tooltips:{
                                        },
                                        hover:{
                                            mode:'nearest',
                                            animationDuration:400,
                                        },
                                    }
                                });
                            </script>
                        @append
                    </div>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-sm-12 col-md-6">
            <!-- small box -->
            <div class="small-box bg-blue">
                <div class="inner">
                    <h3>Total Tobacco</h3>

                    <h3>556,554,194<sup style="font-size: 20px">tons</sup></h3>

                    <p>Last month you consumed 305,995,999 tons</p>
                    <p>Last month you ordered 289,000,568 tons</p>
                    <div>
                        <canvas id="myChart2" width="700" height="400" class="bg-gray"></canvas>
                        @section('js')

                            <script>
                                var ctx2 = document.getElementById("myChart2");
                                var myChart2 = new Chart(ctx2, {
                                    type: 'bar',
                                    data: {
                                        labels : ["January","February","March","April","May","June","July",],
                                        datasets : [
                                            {
                                                data : [650545111,80545111,900545111,805451111,505451116,505451115,154511140,],
                                                backgroundColor :'#3498db',
                                                borderColor : 'rgba(136,136,136,0.5)',
                                                pointBackgroundColor:'#3498db',
                                                pointBorderColor : '#fff',
                                                label:"Tobacco Consumed"},

                                            {
                                                data : [705451117,480545111,905451119,805451118,905451116,605451116,1005451110,],
                                                backgroundColor :'#2ecccc',
                                                borderColor : '#aaaaaa',
                                                pointBackgroundColor:'#6d2ecc',
                                                pointBorderColor : '#fff',
                                                label:"Tobacco Ordered"},

                                        ]
                                    },
                                    options: {
                                        responsive:true,
                                        layout:{padding:{top:12,left:12,bottom:12,},},
                                        scales: {
                                            xAxes:[{
                                                stacked: true,gridLines:{borderDash:[],},
                                            }],

                                            yAxes:[{
                                                stacked: true,gridLines:{borderDash:[],},
                                            }],
                                        },plugins:{
                                            datalabels:{display:true,
                                                font:{
                                                    style:' bold',},},
                                        },
                                        legend:{
                                            labels:{
                                                generateLabels: function(chart){
                                                    return  chart.data.datasets.map( function( dataset, i ){
                                                        return{
                                                            text:dataset.label,
                                                            lineCap:dataset.borderCapStyle,
                                                            lineDash:[],
                                                            lineDashOffset: 0,
                                                            lineJoin:dataset.borderJoinStyle,
                                                            fillStyle:dataset.backgroundColor,
                                                            strokeStyle:dataset.borderColor,
                                                            lineWidth:dataset.pointBorderWidth,
                                                            lineDash:dataset.borderDash,
                                                        }
                                                    })
                                                },

                                            },
                                        },

                                        title:{
                                            display:true,
                                            text:'Total Tobacco',
                                            fontColor:'#3498db',
                                            fontSize:32,
                                            fontStyle:' bold',
                                        },
                                        elements: {
                                            arc: {
                                            },
                                            point: {},
                                            line: {tension:0.4,
                                            },
                                            rectangle: {
                                            },
                                        },
                                        tooltips:{
                                        },
                                        hover:{
                                            mode:'nearest',
                                            animationDuration:400,
                                        },
                                    }
                                });
                            </script>
                        @append
                    </div>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-sm-12 col-md-6">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Latest Transactions</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding bg-blue text-black">
                    <table class="table table-hover">
                        <tbody><tr>
                            <th>Transaction ID</th>
                            <th>Date</th>
                            <th>Type</th>
                            <th>Quantity</th>
                        </tr>
                        <tr>
                            <td><a href="">183</a></td>
                            <td>11-7-2018</td>
                            <td>data</td>
                            <td>50,000</td>
                        </tr>
                        <tr>
                            <td><a href="">188</a></td>
                            <td>11-7-2018</td>
                            <td>data</td>
                            <td>50,000</td>
                        </tr>
                        <tr>
                            <td><a href="">199</a></td>
                            <td>11-7-2018</td>
                            <td>data</td>
                            <td>50,000</td>
                        </tr>
                        <tr>
                            <td><a href="">200</a></td>
                            <td>11-7-2018</td>
                            <td>data</td>
                            <td>50,000</td>
                        </tr>
                        </tbody></table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <!-- ./col -->
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Latest Orders</h3>

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
                            <td><a href="">183</a></td>
                            <td><a href="">Ahmed Ali</a></td>
                            <td>11-7-2018</td>
                            <td>11-7-2018</td>
                            <td>CIF</td>
                            <td><span class="label label-success">Approved</span></td>
                            <td>They will give 5% discount the next time we order</td>
                        </tr>
                        <tr>
                            <td><a href="">219</a></td>
                            <td><a href="">Alexander Mohammed</a></td>
                            <td>11-7-2018</td>
                            <td>11-7-2018</td>
                            <td>CIF</td>
                            <td><span class="label label-warning">Pending</span></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><a href="">657</a></td>
                            <td><a href="">Ibtisam Doe</a></td>
                            <td>11-7-2018</td>
                            <td>11-7-2018</td>
                            <td>FOB</td>
                            <td><span class="label label-success">Approved</span></td>
                            <td>This is very necessary for the XVR machine</td>
                        </tr>
                        <tr>
                            <td><a href="">175</a></td>
                            <td><a href="">Fatimah Salah</a></td>
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