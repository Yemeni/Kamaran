@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')

    <h1>Track Shipments</h1>

@stop

@section('content')

    <div class="row">
        @alert
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Pending Shipments</h3>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
            @endif
            <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table class="table table-hover datatables">
                        <thead>
                        <tr>
                            <th>Shipment ID</th>
                            <th>Item</th>
                            <th>Staff</th>
                            <th>Quantity</th>
                            <th>Comment</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            if (! auth()->user()->isAdmin()){
                                $pending = $pending->where('category_id', auth()->user()->category_id);
                            }
                        @endphp
                        @foreach($pending as $ship)
                            <tr>
                                <td>{{ $ship->id }}</td>
                                <td>
                                    <a href="">{{ $ship->order->item->name }}</a>
                                </td>
                                <td>
                                    <a href="">{{ $ship->user->name }}</a>
                                </td>
                                <td>{{ $ship->quantity }} {{ $ship->order->item->unit }}</td>
                                <td>{{ $ship->comment ?? '-' }}</td>
                                <td>
                                    <button type="button"
                                            class="btn btn-info btn-sm"
                                            data-toggle="modal"
                                            data-target="#myModal">Process
                                    </button>
                                </td>
                                <!-- Modal -->
                                <div id="myModal" class="modal fade" role="dialog">
                                    <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;
                                                </button>
                                                <h4 class="modal-title">Shipment Information:</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form role="form"
                                                      action="{{ url('/shipment/'.$ship->id) }}"
                                                      method="post">
                                                    @csrf
                                                    @method('PUT')

                                                    <div class="box-body">
                                                        <div class="form-group">
                                                            <label for="">Invoice:</label>
                                                                <input type="number"
                                                                       name=""
                                                                       class="form-control"
                                                                       id="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Expected Arrival Date:</label>
                                                            <div class="input-group date">
                                                                <div class="input-group-addon">
                                                                    <i class="fa fa-calendar"></i>
                                                                </div>
                                                                <input type="text"
                                                                       name="arrival_date"
                                                                       class="form-control pull-right input-append date form_datetime"
                                                                       id="">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="">Arrival Date:</label>
                                                            <div class="input-group date">
                                                                <div class="input-group-addon">
                                                                    <i class="fa fa-calendar"></i>
                                                                </div>
                                                                <input type="text"
                                                                       name="expected_date"
                                                                       class="form-control pull-right input-append date form_datetime"
                                                                       id="">
                                                            </div>
                                                        </div>


                                                        <div class="form-group">
                                                            <label for="">Status:</label>
                                                            <select name="shipment_status" class="form-control">
                                                                <option value="on_hold" {{ $ship->shipment_status == 'on_hold' ? 'selected' : '' }}>
                                                                    on Hold
                                                                </option>
                                                                <option value="moving" {{ $ship->shipment_status == 'moving' ? 'selected' : '' }}>
                                                                    Moving
                                                                </option>
                                                                <option value="delayed" {{ $ship->shipment_status == 'delayed' ? 'selected' : '' }}>
                                                                    Delayed
                                                                </option>
                                                                <option value="cancelled" {{ $ship->shipment_status == 'cancelled' ? 'selected' : '' }}>
                                                                    Canceled
                                                                </option>
                                                                <option value="arrived" {{ $ship->shipment_status == 'arrived' ? 'selected' : '' }}>
                                                                    Arrived
                                                                </option>
                                                            </select>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="">Quantity:</label>
                                                            <input type="number"
                                                                   max="{{ $ship->order->quantity - $ship->order->shipmentTotalQuantity() }}"
                                                                   name="quantity"
                                                                   class="form-control"
                                                                   id="">
                                                            <span>{{ $ship->order->quantity - $ship->order->shipmentTotalQuantity() }} {{ $ship->order->item->unit }}
                                                                remaining
                                                            </span>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="">Item Name:</label>
                                                            <input type="text"
                                                                   disabled=""
                                                                   value="{{ $ship->order->item->name }}"
                                                                   class="form-control"
                                                                   id="">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="">Danger Level:</label>
                                                            <input type="text"
                                                                   disabled=""
                                                                   value="{{ $ship->order->item->danger_level }}"
                                                                   class="form-control"
                                                                   id="">
                                                        </div>

                                                        <!-- /.box-body -->

                                                        <div class="box-footer">
                                                            <button type="button"
                                                                    class="btn btn-default"
                                                                    data-dismiss="modal">
                                                                Close
                                                            </button>
                                                            <button type="submit" class="btn btn-primary pull-right">
                                                                Submit
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>
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

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">On Hold Shipments</h3>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
            @endif
            <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table class="table table-hover datatables">
                        <thead>
                        <tr>
                            <th>Shipment ID</th>
                            <th>Invoice</th>
                            <th>Item</th>
                            <th>Staff</th>
                            <th>Partial</th>
                            <th>Date</th>
                            <th>Expected Arrival Date</th>
                            <th>Quantity</th>
                            <th>Comment</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($onHold as $ship)
                            <tr>
                                <td>{{ $ship->id }}</td>
                                <td>5555555</td>
                                <td>
                                    <a href="">{{ $ship->order->item->name }}</a>
                                </td>
                                <td>
                                    <a href="">{{ $ship->user->name }}</a>
                                </td>
                                <td>{{ $ship->partial ? 'True' : 'False' }}</td>
                                <td>{{ $ship->date->format('d-m-y') }}</td>
                                <td>{{ $ship->expected_date->format('d-m-y') }}</td>
                                <td>{{ $ship->quantity }} {{ $ship->order->item->unit }}</td>
                                <td>{{ $ship->comment }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle btn-sm"
                                                type="button"
                                                data-toggle="dropdown">Change Status
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="" data-toggle="modal" data-target="#onHoldModal">Edit</a>
                                            </li>
                                            <li class="divider"></li>
                                            <li>
                                                <a href="{{ url('/shipment/'.$ship->id.'/moving') }}">Moving</a>
                                            </li>
                                            <li>
                                                <a href="{{ url('/shipment/'.$ship->id.'/cancelled') }}">Canceled</a>
                                            </li>
                                            <li>
                                                <a href="{{ url('/shipment/'.$ship->id.'/delayed') }}">Delayed</a>
                                            </li>
                                            <li>
                                                <a href="{{ url('/shipment/'.$ship->id.'/arrived') }}">Arraived</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div id="onHoldModal" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;
                                            </button>
                                            <h4 class="modal-title">Shipment Information:</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form role="form"
                                                  action=""
                                                  method="post">
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label for="">Invoice:</label>
                                                        <input type="number"
                                                               name=""
                                                               class="form-control"
                                                               id="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Expected Arrival Date:</label>
                                                        <div class="input-group date">
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                            </div>
                                                            <input type="text"
                                                                   name="arrival_date"
                                                                   class="form-control pull-right input-append date form_datetime"
                                                                   id="">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">Arrival Date:</label>
                                                        <div class="input-group date">
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                            </div>
                                                            <input type="text"
                                                                   name="expected_date"
                                                                   class="form-control pull-right input-append date form_datetime"
                                                                   id="">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">Status:</label>
                                                        <select name="shipment_status" class="form-control">
                                                            <option value="on_hold">
                                                                on Hold
                                                            </option>
                                                            <option value="moving">
                                                                Moving
                                                            </option>
                                                            <option value="delayed">
                                                                Delayed
                                                            </option>
                                                            <option value="cancelled">
                                                                Canceled
                                                            </option>
                                                            <option value="arrived">
                                                                Arrived
                                                            </option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">Item Name:</label>
                                                        <input type="text"
                                                               disabled=""
                                                               value=""
                                                               class="form-control"
                                                               id="">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">Danger Level:</label>
                                                        <input type="text"
                                                               disabled=""
                                                               value=""
                                                               class="form-control"
                                                               id="">
                                                    </div>

                                                    <!-- /.box-body -->

                                                    <div class="box-footer">
                                                        <button type="button"
                                                                class="btn btn-default"
                                                                data-dismiss="modal">
                                                            Close
                                                        </button>
                                                        <button type="submit" class="btn btn-primary pull-right">
                                                            Submit
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
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

                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover datatables">

                        <thead>
                            <th>Shipment ID</th>
                            <th>Invoice</th>
                            <th>Item</th>
                            <th>Staff</th>
                            <th>Partial</th>
                            <th>Date</th>
                            <th>Expected Arrival Date</th>
                            <th>Quantity</th>
                            <th>Comment</th>
                            <th></th>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                555
                            </td>
                            <td>555555</td>
                            <td>
                                <a href="">Tobacco Type 50</a>
                            </td>
                            <td>
                                <a href="">Ahmed Ali</a>
                            </td>
                            <td>True</td>
                            <td>11-7-2018</td>
                            <td>22-8-2018</td>
                            <td>50,000 tons</td>
                            <td>They will give 5% discount the next time we order</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle btn-sm"
                                            type="button"
                                            data-toggle="dropdown">Change Status
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="" data-toggle="modal" data-target="#movingModal">Edit</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="#">on Hold</a>
                                        </li>
                                        <li>
                                            <a href="#">Canceled</a>
                                        </li>
                                        <li>
                                            <a href="#">Delayed</a>
                                        </li>
                                        <li>
                                            <a href="#">Arraived</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                            <!-- Modal -->
                            <div id="movingModal" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;
                                            </button>
                                            <h4 class="modal-title">Shipment Information:</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form role="form"
                                                  action=""
                                                  method="post">
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label for="">Invoice:</label>
                                                        <input type="number"
                                                               name=""
                                                               class="form-control"
                                                               id="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Expected Arrival Date:</label>
                                                        <div class="input-group date">
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                            </div>
                                                            <input type="text"
                                                                   name="arrival_date"
                                                                   class="form-control pull-right input-append date form_datetime"
                                                                   id="">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">Arrival Date:</label>
                                                        <div class="input-group date">
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                            </div>
                                                            <input type="text"
                                                                   name="expected_date"
                                                                   class="form-control pull-right input-append date form_datetime"
                                                                   id="">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">Status:</label>
                                                        <select name="shipment_status" class="form-control">
                                                            <option value="on_hold">
                                                                on Hold
                                                            </option>
                                                            <option value="moving">
                                                                Moving
                                                            </option>
                                                            <option value="delayed">
                                                                Delayed
                                                            </option>
                                                            <option value="cancelled">
                                                                Canceled
                                                            </option>
                                                            <option value="arrived">
                                                                Arrived
                                                            </option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">Item Name:</label>
                                                        <input type="text"
                                                               disabled=""
                                                               value=""
                                                               class="form-control"
                                                               id="">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">Danger Level:</label>
                                                        <input type="text"
                                                               disabled=""
                                                               value=""
                                                               class="form-control"
                                                               id="">
                                                    </div>

                                                    <!-- /.box-body -->

                                                    <div class="box-footer">
                                                        <button type="button"
                                                                class="btn btn-default"
                                                                data-dismiss="modal">
                                                            Close
                                                        </button>
                                                        <button type="submit" class="btn btn-primary pull-right">
                                                            Submit
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
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
                    <h3 class="box-title">Cancelled Shipments</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover datatables">

                        <thead>
                            <th>Shipment ID</th>
                            <th>Invoice</th>
                            <th>Item</th>
                            <th>Staff</th>
                            <th>Partial</th>
                            <th>Date</th>
                            <th>Expected Arrival Date</th>
                            <th>Quantity</th>
                            <th>Comment</th>
                            <th></th>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                555
                            </td>
                            <td>5555555</td>
                            <td>
                                <a href="">Tobacco Type 50</a>
                            </td>
                            <td>
                                <a href="">Ahmed Ali</a>
                            </td>
                            <td>True</td>
                            <td>11-7-2018</td>
                            <td>22-8-2018</td>
                            <td>50,000 tons</td>
                            <td>They will give 5% discount the next time we order</td>
                            <td>
                                <button type="button" class="btn btn-info btn-sm">Reship
                                </button>
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
                    <h3 class="box-title">Delayed Shipments</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover datatables">
                        <thead>
                            <th>Shipment ID</th>
                            <th>Invoice</th>
                            <th>Item</th>
                            <th>Staff</th>
                            <th>Partial</th>
                            <th>Date</th>
                            <th>Expected Arrival Date</th>
                            <th>Quantity</th>
                            <th>Comment</th>
                            <th></th>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                555
                            </td>
                            <td>5555555</td>
                            <td>
                                <a href="">Tobacco Type 50</a>
                            </td>
                            <td>
                                <a href="">Ahmed Ali</a>
                            </td>
                            <td>True</td>
                            <td>11-7-2018</td>
                            <td>22-8-2018</td>
                            <td>50,000 tons</td>
                            <td>They will give 5% discount the next time we order</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle btn-sm"
                                            type="button"
                                            data-toggle="dropdown">Change Status
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="" data-toggle="modal" data-target="#movingModal">Edit</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="#">Moving</a>
                                        </li>
                                        <li>
                                            <a href="#">Canceled</a>
                                        </li>
                                        <li>
                                            <a href="#">on Hold</a>
                                        </li>
                                        <li>
                                            <a href="#">Arraived</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                            <!-- Modal -->
                            <div id="movingModal" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;
                                            </button>
                                            <h4 class="modal-title">Shipment Information:</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form role="form"
                                                  action=""
                                                  method="post">
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label for="">Invoice:</label>
                                                        <input type="number"
                                                               name=""
                                                               class="form-control"
                                                               id="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Expected Arrival Date:</label>
                                                        <div class="input-group date">
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                            </div>
                                                            <input type="text"
                                                                   name="arrival_date"
                                                                   class="form-control pull-right input-append date form_datetime"
                                                                   id="">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">Arrival Date:</label>
                                                        <div class="input-group date">
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                            </div>
                                                            <input type="text"
                                                                   name="expected_date"
                                                                   class="form-control pull-right input-append date form_datetime"
                                                                   id="">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">Status:</label>
                                                        <select name="shipment_status" class="form-control">
                                                            <option value="on_hold">
                                                                on Hold
                                                            </option>
                                                            <option value="moving">
                                                                Moving
                                                            </option>
                                                            <option value="delayed">
                                                                Delayed
                                                            </option>
                                                            <option value="cancelled">
                                                                Canceled
                                                            </option>
                                                            <option value="arrived">
                                                                Arrived
                                                            </option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">Item Name:</label>
                                                        <input type="text"
                                                               disabled=""
                                                               value=""
                                                               class="form-control"
                                                               id="">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">Danger Level:</label>
                                                        <input type="text"
                                                               disabled=""
                                                               value=""
                                                               class="form-control"
                                                               id="">
                                                    </div>

                                                    <!-- /.box-body -->

                                                    <div class="box-footer">
                                                        <button type="button"
                                                                class="btn btn-default"
                                                                data-dismiss="modal">
                                                            Close
                                                        </button>
                                                        <button type="submit" class="btn btn-primary pull-right">
                                                            Submit
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
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
                    <h3 class="box-title">Arrived Shipments</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover datatables">
                        <thead>
                            <th>Shipment ID</th>
                            <th>Invoice</th>
                            <th>Item</th>
                            <th>Staff</th>
                            <th>Partial</th>
                            <th>Date</th>
                            <th>Expected Arrival Date</th>
                            <th>Arrival Date</th>
                            <th>Quantity</th>
                            <th>Comment</th>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                555
                            </td>
                            <td>555555555</td>
                            <td>
                                <a href="">Tobacco Type 50</a>
                            </td>
                            <td>
                                <a href="">Ahmed Ali</a>
                            </td>
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
        $(".form_datetime").datetimepicker();
    </script>
@stop
