@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Track Shipments</h1>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">On Hold Shipments</h3>

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
                            <th>Shipment ID</th>
                            <th>Item</th>
                            <th>Staff</th>
                            <th>Partial</th>
                            <th>Date</th>
                            <th>Expected Arrival Date</th>
                            <th>Quantity</th>
                            <th>Comment</th>
                        </tr>
                        <tr>
                            <td><a href="">555</a></td>
                            <td><a href="">Tobacco Type 50</a></td>
                            <td><a href="">Ahmed Ali</a></td>
                            <td>True</td>
                            <td>11-7-2018</td>
                            <td>22-8-2018</td>
                            <td>50,000 tons</td>
                            <td>They will give 5% discount the next time we order</td>
                        </tr>
                        <tr>
                            <td><a href="">555</a></td>
                            <td><a href="">Tobacco Type 50</a></td>
                            <td><a href="">Ahmed Ali</a></td>
                            <td>True</td>
                            <td>11-7-2018</td>
                            <td>22-8-2018</td>
                            <td>50,000 tons</td>
                            <td>They will give 5% discount the next time we order</td>
                        </tr>
                        <tr>
                            <td><a href="">555</a></td>
                            <td><a href="">Tobacco Type 50</a></td>
                            <td><a href="">Ahmed Ali</a></td>
                            <td>True</td>
                            <td>11-7-2018</td>
                            <td>22-8-2018</td>
                            <td>50,000 tons</td>
                            <td>They will give 5% discount the next time we order</td>
                        </tr>
                        <tr>
                            <td><a href="">555</a></td>
                            <td><a href="">Tobacco Type 50</a></td>
                            <td><a href="">Ahmed Ali</a></td>
                            <td>True</td>
                            <td>11-7-2018</td>
                            <td>22-8-2018</td>
                            <td>50,000 tons</td>
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
                    <h3 class="box-title">Moving Shipments</h3>

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
                            <th>Shipment ID</th>
                            <th>Item</th>
                            <th>Staff</th>
                            <th>Partial</th>
                            <th>Date</th>
                            <th>Expected Arrival Date</th>
                            <th>Quantity</th>
                            <th>Comment</th>
                        </tr>
                        <tr>
                            <td><a href="">555</a></td>
                            <td><a href="">Tobacco Type 50</a></td>
                            <td><a href="">Ahmed Ali</a></td>
                            <td>True</td>
                            <td>11-7-2018</td>
                            <td>22-8-2018</td>
                            <td>50,000 tons</td>
                            <td>They will give 5% discount the next time we order</td>
                        </tr>
                        <tr>
                            <td><a href="">555</a></td>
                            <td><a href="">Tobacco Type 50</a></td>
                            <td><a href="">Ahmed Ali</a></td>
                            <td>True</td>
                            <td>11-7-2018</td>
                            <td>22-8-2018</td>
                            <td>50,000 tons</td>
                            <td>They will give 5% discount the next time we order</td>
                        </tr>
                        <tr>
                            <td><a href="">555</a></td>
                            <td><a href="">Tobacco Type 50</a></td>
                            <td><a href="">Ahmed Ali</a></td>
                            <td>True</td>
                            <td>11-7-2018</td>
                            <td>22-8-2018</td>
                            <td>50,000 tons</td>
                            <td>They will give 5% discount the next time we order</td>
                        </tr>
                        <tr>
                            <td><a href="">555</a></td>
                            <td><a href="">Tobacco Type 50</a></td>
                            <td><a href="">Ahmed Ali</a></td>
                            <td>True</td>
                            <td>11-7-2018</td>
                            <td>22-8-2018</td>
                            <td>50,000 tons</td>
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
                    <h3 class="box-title">Cancelled Shipments</h3>

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
                            <th>Shipment ID</th>
                            <th>Item</th>
                            <th>Staff</th>
                            <th>Partial</th>
                            <th>Date</th>
                            <th>Expected Arrival Date</th>
                            <th>Quantity</th>
                            <th>Comment</th>
                        </tr>
                        <tr>
                            <td><a href="">555</a></td>
                            <td><a href="">Tobacco Type 50</a></td>
                            <td><a href="">Ahmed Ali</a></td>
                            <td>True</td>
                            <td>11-7-2018</td>
                            <td>22-8-2018</td>
                            <td>50,000 tons</td>
                            <td>They will give 5% discount the next time we order</td>
                        </tr>
                        <tr>
                            <td><a href="">555</a></td>
                            <td><a href="">Tobacco Type 50</a></td>
                            <td><a href="">Ahmed Ali</a></td>
                            <td>True</td>
                            <td>11-7-2018</td>
                            <td>22-8-2018</td>
                            <td>50,000 tons</td>
                            <td>They will give 5% discount the next time we order</td>
                        </tr>
                        <tr>
                            <td><a href="">555</a></td>
                            <td><a href="">Tobacco Type 50</a></td>
                            <td><a href="">Ahmed Ali</a></td>
                            <td>True</td>
                            <td>11-7-2018</td>
                            <td>22-8-2018</td>
                            <td>50,000 tons</td>
                            <td>They will give 5% discount the next time we order</td>
                        </tr>
                        <tr>
                            <td><a href="">555</a></td>
                            <td><a href="">Tobacco Type 50</a></td>
                            <td><a href="">Ahmed Ali</a></td>
                            <td>True</td>
                            <td>11-7-2018</td>
                            <td>22-8-2018</td>
                            <td>50,000 tons</td>
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
                    <h3 class="box-title">Delayed Shipments</h3>

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
                            <th>Shipment ID</th>
                            <th>Item</th>
                            <th>Staff</th>
                            <th>Partial</th>
                            <th>Date</th>
                            <th>Expected Arrival Date</th>
                            <th>Quantity</th>
                            <th>Comment</th>
                        </tr>
                        <tr>
                            <td><a href="">555</a></td>
                            <td><a href="">Tobacco Type 50</a></td>
                            <td><a href="">Ahmed Ali</a></td>
                            <td>True</td>
                            <td>11-7-2018</td>
                            <td>22-8-2018</td>
                            <td>50,000 tons</td>
                            <td>They will give 5% discount the next time we order</td>
                        </tr>
                        <tr>
                            <td><a href="">555</a></td>
                            <td><a href="">Tobacco Type 50</a></td>
                            <td><a href="">Ahmed Ali</a></td>
                            <td>True</td>
                            <td>11-7-2018</td>
                            <td>22-8-2018</td>
                            <td>50,000 tons</td>
                            <td>They will give 5% discount the next time we order</td>
                        </tr>
                        <tr>
                            <td><a href="">555</a></td>
                            <td><a href="">Tobacco Type 50</a></td>
                            <td><a href="">Ahmed Ali</a></td>
                            <td>True</td>
                            <td>11-7-2018</td>
                            <td>22-8-2018</td>
                            <td>50,000 tons</td>
                            <td>They will give 5% discount the next time we order</td>
                        </tr>
                        <tr>
                            <td><a href="">555</a></td>
                            <td><a href="">Tobacco Type 50</a></td>
                            <td><a href="">Ahmed Ali</a></td>
                            <td>True</td>
                            <td>11-7-2018</td>
                            <td>22-8-2018</td>
                            <td>50,000 tons</td>
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
                    <h3 class="box-title">Arrived Shipments</h3>

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
                            <th>Shipment ID</th>
                            <th>Item</th>
                            <th>Staff</th>
                            <th>Partial</th>
                            <th>Date</th>
                            <th>Expected Arrival Date</th>
                            <th>Arrival Date</th>
                            <th>Quantity</th>
                            <th>Comment</th>
                        </tr>
                        <tr>
                            <td><a href="">555</a></td>
                            <td><a href="">Tobacco Type 50</a></td>
                            <td><a href="">Ahmed Ali</a></td>
                            <td>True</td>
                            <td>11-7-2018</td>
                            <td>22-8-2018</td>
                            <td>25-8-2018</td>
                            <td>50,000 tons</td>
                            <td>They will give 5% discount the next time we order</td>
                        </tr>
                        <tr>
                            <td><a href="">555</a></td>
                            <td><a href="">Tobacco Type 50</a></td>
                            <td><a href="">Ahmed Ali</a></td>
                            <td>True</td>
                            <td>11-7-2018</td>
                            <td>22-8-2018</td>
                            <td>25-8-2018</td>
                            <td>50,000 tons</td>
                            <td>They will give 5% discount the next time we order</td>
                        </tr>
                        <tr>
                            <td><a href="">555</a></td>
                            <td><a href="">Tobacco Type 50</a></td>
                            <td><a href="">Ahmed Ali</a></td>
                            <td>True</td>
                            <td>11-7-2018</td>
                            <td>22-8-2018</td>
                            <td>25-8-2018</td>
                            <td>50,000 tons</td>
                            <td>They will give 5% discount the next time we order</td>
                        </tr>
                        <tr>
                            <td><a href="">555</a></td>
                            <td><a href="">Tobacco Type 50</a></td>
                            <td><a href="">Ahmed Ali</a></td>
                            <td>True</td>
                            <td>11-7-2018</td>
                            <td>22-8-2018</td>
                            <td>25-8-2018</td>
                            <td>50,000 tons</td>
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