@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')

    <h1>Track Shipments</h1>

@stop

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Pending Shipments</h3>

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
                            <th>Quantity</th>
                            <th>Comment</th>
                            <th></th>
                        </tr>
                        <tr>
                            <td>144</td>
                            <td><a href="">Tobacco Type 50</a></td>
                            <td><a href="">Ahmed Ali</a></td>
                            <td>50,000 tons</td>
                            <td>They will give 5% discount the next time we order</td>
                            <td>
                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Process</button>
                            </td>
                            <!-- Modal -->
                            <div id="myModal" class="modal fade" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Shipment Information:</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form role="form" _lpchecked="1">
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label for="">Date:</label>
                                                        <div class="input-group date">
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                            </div>
                                                            <input type="text" class="form-control pull-right input-append date form_datetime" id="">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">Expected Arrival:</label>
                                                        <div class="input-group date">
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                            </div>
                                                            <input type="text" class="form-control pull-right input-append date form_datetime" id="">
                                                        </div>
                                                    </div>


                                                    <div class="form-group">
                                                        <label for="">Status:</label>
                                                        <select class="form-control">
                                                            <option>on Hold</option>
                                                            <option>Moving</option>
                                                            <option>Delayed</option>
                                                            <option>Canceled</option>
                                                            <option>Arraived</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">Quantity:</label>
                                                        <input type="text" class="form-control" id=""> <span>20,000 Tones remaining</span>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">Item Name:</label>
                                                        <input type="text" disabled="" value="Wire Type xyz" class="form-control" id="">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">Danger Level:</label>
                                                        <input type="text" disabled="" value="Flammable" class="form-control" id="">
                                                    </div>

                                                    <!-- /.box-body -->

                                                    <div class="box-footer">
                                                        <button type="clear" class="btn btn-default ">Cancel</button>
                                                        <button type="submit" class="btn btn-primary pull-right">Submit</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
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
                            <th></th>
                        </tr>
                        <tr>
                            <td>144</td>
                            <td><a href="">Tobacco Type 50</a></td>
                            <td><a href="">Ahmed Ali</a></td>
                            <td>True</td>
                            <td>11-7-2018</td>
                            <td>22-8-2018</td>
                            <td>50,000 tons</td>
                            <td>They will give 5% discount the next time we order</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle btn-sm" type="button" data-toggle="dropdown">Change Status
                                        <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Moving</a></li>
                                        <li><a href="#">Canceled</a></li>
                                        <li><a href="#">Delayed</a></li>
                                        <li><a href="#">Arraived</a></li>
                                        <li class="divider"></li>
                                        <li><a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Edit</a></li>
                                    </ul>
                                </div>
                            </td>
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
                            <th></th>
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
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle btn-sm" type="button" data-toggle="dropdown">Change Status
                                        <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">on Hold</a></li>
                                        <li><a href="#">Canceled</a></li>
                                        <li><a href="#">Delayed</a></li>
                                        <li><a href="#">Arraived</a></li>
                                        <li class="divider"></li>
                                        <li><a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Edit</a></li>
                                    </ul>
                                </div>
                            </td>
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
                            <th></th>
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
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle btn-sm" type="button" data-toggle="dropdown">Change Status
                                        <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Moving</a></li>
                                        <li><a href="#">Canceled</a></li>
                                        <li><a href="#">on Hold</a></li>
                                        <li><a href="#">Arraived</a></li>
                                        <li class="divider"></li>
                                        <li><a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Edit</a></li>
                                    </ul>
                                </div>
                            </td>
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
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>

@stop

@section('adminlte_js')
    <script type="text/javascript">
        $(".form_datetime").datetimepicker({
            format: "dd MM yyyy - hh:ii"
        });
    </script>
@stop
