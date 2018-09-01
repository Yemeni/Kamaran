@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')

    <h1>Shipment Status</h1>

@stop

@section('content')


    <div class="row">
        <div class="col-xs-12">
            @alert
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
                            <th>Supplier</th>
                            <th>Item</th>
                            <th>Staff</th>
                            <th>Partial</th>
                            <th>Date</th>
                            <th>Expected Arrival Date</th>
                            <th>Quantity</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($onHold as $ship)
                            <tr>
                                <td>{{ $ship->id }}</td>
                                <td>{{ $ship->invoice }}</td>
                                <td>
                                    {{ $ship->order->supplier->name }}
                                </td>
                                <td>
                                    {{ $ship->order->item->name }}
                                </td>
                                <td>
                                    {{ $ship->user->name }}
                                </td>
                                <td>
                                    @if($ship->partial)
                                        Yes
                                    @else
                                        No
                                    @endif
                                </td>
                                <td>{{ $ship->date->format('d-m-y') }}</td>
                                <td>{{ $ship->expected_date->format('d-m-y') }}</td>
                                <td>{{ $ship->quantity }} {{ $ship->order->item->unit }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle btn-sm modal-button"
                                                type="button"
                                                data-toggle="dropdown">Change Status
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li>
                                                <a href=""
                                                   data-toggle="modal"
                                                   data-target="#onHoldModal{{ $ship->id }}">
                                                    <i class="fa fa-edit"></i>
                                                    Edit
                                                </a>
                                            </li>
                                            <li class="divider"></li>
                                            <li>
                                                <a href="{{ url('/shipment/'.$ship->id.'/moving') }}">
                                                    <i class="fa fa-anchor"></i>
                                                    Moving
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ url('/shipment/'.$ship->id.'/cancelled') }}">
                                                    <i class="fa fa-anchor"></i>
                                                    Canceled
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ url('/shipment/'.$ship->id.'/delayed') }}">
                                                    <i class="fa fa-anchor"></i>
                                                    Delayed
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ url('/shipment/'.$ship->id.'/arrived') }}">
                                                    <i class="fa fa-anchor"></i>
                                                    Arrived
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div id="onHoldModal{{ $ship->id }}" class="modal fade" role="dialog">
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
                                                  method="post" autocomplete="off">
                                                @csrf
                                                @method('PUT')

                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label for="">Invoice:</label>
                                                        <input type="number"
                                                               name="invoice"
                                                               value="{{ $ship->invoice }}"
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
                                                                   value="{{ $ship->expected_date->format('Y-m-d H:i') }}"
                                                                   name="expected_date"
                                                                   class="form-control pull-right input-append date form_datetime"
                                                                   id="">
                                                        </div>
                                                    </div>

                                                    <div class="form-group arrival-date">
                                                        <label for="">Arrival Date:</label>
                                                        <div class="input-group date">
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                            </div>
                                                            <input type="text"
                                                                   value="{{ $ship->arrival_date ? $ship->arrival_date->format('Y-m-d H:i') : ''}}"
                                                                   name="arrival_date"
                                                                   class="form-control pull-right input-append date form_datetime"
                                                                   id="">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">Status:</label>
                                                        <select name="shipment_status" class="form-control shipment-select js-example-basic-single">
                                                            <option {{ $ship->shipment_status == 'on_hold' ? 'selected' : '' }} value="on_hold">
                                                                on Hold
                                                            </option>
                                                            <option {{ $ship->shipment_status == 'moving' ? 'selected' : '' }} value="moving">
                                                                Moving
                                                            </option>
                                                            <option {{ $ship->shipment_status == 'delayed' ? 'selected' : '' }} value="delayed">
                                                                Delayed
                                                            </option>
                                                            <option {{ $ship->shipment_status == 'cancelled' ? 'selected' : '' }} value="cancelled">
                                                                Canceled
                                                            </option>
                                                            <option {{ $ship->shipment_status == 'arrived' ? 'selected' : '' }} value="arrived">
                                                                Arrived
                                                            </option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">Supplier:</label>
                                                        <input type="text"
                                                               disabled=""
                                                               value="{{ $ship->order->supplier->name }}"
                                                               class="form-control"
                                                               id="">
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
                                                                   @switch( $ship->order->item->danger_level)
                                                                       @case('low')
                                                                           value="C- Low Priority"
                                                                               @break

                                                                       @case('normal')
                                                                            value="B- Normal Priority"
                                                                               @break

                                                                       @case('high')
                                                                               value="A- High Priority"
                                                                               @break

                                                                       @default
                                                                               Undefined
                                                                   @endswitch
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
                <div class="box-body table-responsive">
                    <table class="table table-hover datatables">

                        <thead>
                        <th>Shipment ID</th>
                        <th>Invoice</th>
                        <th>Supplier</th>
                        <th>Item</th>
                        <th>Staff</th>
                        <th>Partial</th>
                        <th>Date</th>
                        <th>Expected Arrival Date</th>
                        <th>Quantity</th>
                        <th></th>
                        </thead>
                        <tbody>
                        @foreach($moving as $ship)
                            <tr>
                                <td>{{ $ship->id }}</td>
                                <td>{{ $ship->invoice }}</td>
                                <td>
                                    {{ $ship->order->supplier->name }}
                                </td>
                                <td>
                                    {{ $ship->order->item->name }}
                                </td>
                                <td>
                                    {{ $ship->user->name }}
                                </td>
                                <td>
                                    @if($ship->partial)
                                        Yes
                                    @else
                                        No
                                    @endif
                                </td>
                                <td>{{ $ship->date->format('d-m-y') }}</td>
                                <td>{{ $ship->expected_date->format('d-m-y') }}</td>
                                <td>{{ $ship->quantity }} {{ $ship->order->item->unit }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle btn-sm modal-button"
                                                type="button"
                                                data-toggle="dropdown">Change Status
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li>
                                                <a href=""
                                                   data-toggle="modal"
                                                   data-target="#movingModal{{ $ship->id }}">
                                                    <i class="fa fa-edit"></i>
                                                    Edit
                                                </a>
                                            </li>
                                            <li class="divider"></li>
                                            <li>
                                                <a href="{{ url('/shipment/'.$ship->id.'/on_hold') }}">
                                                    <i class="fa fa-anchor"></i>
                                                    On Hold
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ url('/shipment/'.$ship->id.'/cancelled') }}">
                                                    <i class="fa fa-anchor"></i>
                                                    Canceled
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ url('/shipment/'.$ship->id.'/delayed') }}">
                                                    <i class="fa fa-anchor"></i>
                                                    Delayed
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ url('/shipment/'.$ship->id.'/arrived') }}">
                                                    <i class="fa fa-anchor"></i>
                                                    Arrived
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div id="movingModal{{ $ship->id }}" class="modal fade" role="dialog">
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
                                                  method="post" autocomplete="off">
                                                @csrf
                                                @method('PUT')

                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label for="">Invoice:</label>
                                                        <input type="number"
                                                               name="invoice"
                                                               value="{{ $ship->invoice }}"
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
                                                                   value="{{ $ship->expected_date->format('Y-m-d H:i') }}"
                                                                   name="expected_date"
                                                                   class="form-control pull-right input-append date form_datetime"
                                                                   id="">
                                                        </div>
                                                    </div>

                                                    <div class="form-group arrival-date">
                                                        <label for="">Arrival Date:</label>
                                                        <div class="input-group date">
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                            </div>
                                                            <input type="text"
                                                                   value="{{ $ship->arrival_date ? $ship->arrival_date->format('Y-m-d H:i') : ''}}"
                                                                   name="arrival_date"
                                                                   class="form-control pull-right input-append date form_datetime"
                                                                   id="">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">Status:</label>
                                                        <select name="shipment_status" class="form-control shipment-select js-example-basic-single">
                                                            <option {{ $ship->shipment_status == 'on_hold' ? 'selected' : '' }} value="on_hold">
                                                                on Hold
                                                            </option>
                                                            <option {{ $ship->shipment_status == 'moving' ? 'selected' : '' }} value="moving">
                                                                Moving
                                                            </option>
                                                            <option {{ $ship->shipment_status == 'delayed' ? 'selected' : '' }} value="delayed">
                                                                Delayed
                                                            </option>
                                                            <option {{ $ship->shipment_status == 'cancelled' ? 'selected' : '' }} value="cancelled">
                                                                Canceled
                                                            </option>
                                                            <option {{ $ship->shipment_status == 'arrived' ? 'selected' : '' }} value="arrived">
                                                                Arrived
                                                            </option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">Supplier:</label>
                                                        <input type="text"
                                                               disabled=""
                                                               value="{{ $ship->order->supplier->name }}"
                                                               class="form-control"
                                                               id="">
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
                                                               @switch( $ship->order->item->danger_level)
                                                                   @case('low')
                                                                   value="C- Low Priority"
                                                                   @break

                                                                   @case('normal')
                                                                   value="B- Normal Priority"
                                                                   @break

                                                                   @case('high')
                                                                   value="A- High Priority"
                                                                   @break

                                                                   @default
                                                                   Undefined
                                                               @endswitch
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
                    <h3 class="box-title">Cancelled Shipments</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table class="table table-hover datatables">

                        <thead>
                        <th>Shipment ID</th>
                        <th>Invoice</th>
                        <th>Supplier</th>
                        <th>Item</th>
                        <th>Staff</th>
                        <th>Partial</th>
                        <th>Date</th>
                        <th>Expected Arrival Date</th>
                        <th>Quantity</th>
                        </thead>
                        <tbody>
                        @foreach($cancelled as $ship)
                            <tr>
                                <td>{{ $ship->id }}</td>
                                <td>{{ $ship->invoice }}</td>
                                <td>
                                    {{ $ship->order->supplier->name }}
                                </td>
                                <td>
                                    {{ $ship->order->item->name }}
                                </td>
                                <td>
                                    {{ $ship->user->name }}
                                </td>
                                <td>
                                    @if($ship->partial)
                                        Yes
                                    @else
                                        No
                                    @endif
                                </td>
                                <td>{{ $ship->date->format('d-m-y') }}</td>
                                <td>{{ $ship->expected_date->format('d-m-y') }}</td>
                                <td>{{ $ship->quantity }} {{ $ship->order->item->unit }}</td>
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
                    <h3 class="box-title">Delayed Shipments</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table class="table table-hover datatables">
                        <thead>
                        <th>Shipment ID</th>
                        <th>Invoice</th>
                        <th>Supplier</th>
                        <th>Item</th>
                        <th>Staff</th>
                        <th>Partial</th>
                        <th>Date</th>
                        <th>Expected Arrival Date</th>
                        <th>Quantity</th>
                        <th></th>
                        </thead>
                        </tr>
                        <tbody>
                        @foreach($delayed as $ship)
                            <tr>
                                <td>{{ $ship->id }}</td>
                                <td>{{ $ship->invoice }}</td>
                                <td>
                                    {{ $ship->order->supplier->name }}
                                </td>
                                <td>
                                    {{ $ship->order->item->name }}
                                </td>
                                <td>
                                    {{ $ship->user->name }}
                                </td>
                                <td>
                                    @if($ship->partial)
                                        Yes
                                    @else
                                        No
                                    @endif
                                </td>
                                <td>{{ $ship->date->format('d-m-y') }}</td>
                                <td>{{ $ship->expected_date->format('d-m-y') }}</td>
                                <td>{{ $ship->quantity }} {{ $ship->order->item->unit }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle btn-sm modal-button"
                                                type="button"
                                                data-toggle="dropdown">Change Status
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li>
                                                <a href=""
                                                   data-toggle="modal"
                                                   data-target="#delayedModal{{ $ship->id }}">
                                                    <i class="fa fa-edit"></i>
                                                    Edit
                                                </a>
                                            </li>
                                            <li class="divider"></li>
                                            <li>
                                                <a href="{{ url('/shipment/'.$ship->id.'/moving') }}">
                                                    <i class="fa fa-anchor"></i>
                                                    Moving
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ url('/shipment/'.$ship->id.'/cancelled') }}">
                                                    <i class="fa fa-anchor"></i>
                                                    Canceled
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ url('/shipment/'.$ship->id.'/on_hold') }}">
                                                    <i class="fa fa-anchor"></i>
                                                    On Hold
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ url('/shipment/'.$ship->id.'/arrived') }}">
                                                    <i class="fa fa-anchor"></i>
                                                    Arrived
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div id="delayedModal{{ $ship->id }}" class="modal fade" role="dialog">
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
                                                  method="post" autocomplete="off">
                                                @csrf
                                                @method('PUT')

                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label for="">Invoice:</label>
                                                        <input type="number"
                                                               name="invoice"
                                                               value="{{ $ship->invoice }}"
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
                                                                   value="{{ $ship->expected_date->format('Y-m-d H:i') }}"
                                                                   name="expected_date"
                                                                   class="form-control pull-right input-append date form_datetime"
                                                                   id="">
                                                        </div>
                                                    </div>

                                                    <div class="form-group arrival-date">
                                                        <label for="">Arrival Date:</label>
                                                        <div class="input-group date">
                                                            <div class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                            </div>
                                                            <input type="text"
                                                                   value="{{ $ship->arrival_date ? $ship->arrival_date->format('Y-m-d H:i') : ''}}"
                                                                   name="arrival_date"
                                                                   class="form-control pull-right input-append date form_datetime"
                                                                   id="">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">Status:</label>
                                                        <select name="shipment_status" class="form-control shipment-select js-example-basic-single">
                                                            <option {{ $ship->shipment_status == 'on_hold' ? 'selected' : '' }} value="on_hold">
                                                                on Hold
                                                            </option>
                                                            <option {{ $ship->shipment_status == 'moving' ? 'selected' : '' }} value="moving">
                                                                Moving
                                                            </option>
                                                            <option {{ $ship->shipment_status == 'delayed' ? 'selected' : '' }} value="delayed">
                                                                Delayed
                                                            </option>
                                                            <option {{ $ship->shipment_status == 'cancelled' ? 'selected' : '' }} value="cancelled">
                                                                Canceled
                                                            </option>
                                                            <option {{ $ship->shipment_status == 'arrived' ? 'selected' : '' }} value="arrived">
                                                                Arrived
                                                            </option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">Supplier:</label>
                                                        <input type="text"
                                                               disabled=""
                                                               value="{{ $ship->order->supplier->name }}"
                                                               class="form-control"
                                                               id="">
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
                                                               @switch( $ship->order->item->danger_level)
                                                                   @case('low')
                                                                   value="C- Low Priority"
                                                                   @break

                                                                   @case('normal')
                                                                   value="B- Normal Priority"
                                                                   @break

                                                                   @case('high')
                                                                   value="A- High Priority"
                                                                   @break

                                                                   @default
                                                                   Undefined
                                                               @endswitch
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
                    <h3 class="box-title">Arrived Shipments</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table class="table table-hover datatables">
                        <thead>
                        <th>Shipment ID</th>
                        <th>Invoice</th>
                        <th>Supplier</th>
                        <th>Item</th>
                        <th>Staff</th>
                        <th>Partial</th>
                        <th>Date</th>
                        <th>Expected Arrival Date</th>
                        <th>Arrival Date</th>
                        <th>Quantity</th>
                        </thead>
                        <tbody>
                        @foreach($arrived as $ship)
                            <tr>
                                <td>{{ $ship->id }}</td>
                                <td>{{ $ship->invoice }}</td>
                                <td>
                                    {{ $ship->order->supplier->name }}
                                </td>
                                <td>
                                    {{ $ship->order->item->name }}
                                </td>
                                <td>
                                    {{ $ship->user->name }}
                                </td>
                                <td>
                                    @if($ship->partial)
                                        Yes
                                    @else
                                        No
                                    @endif
                                </td>
                                <td>{{ $ship->date->format('d-m-Y') }}</td>
                                <td>{{ $ship->expected_date->format('d-m-Y') }}</td>
                                <td>{{ $ship->arrival_date ? $ship->arrival_date->format('d-m-Y') : '' }}</td>
                                <td>{{ $ship->quantity }} {{ $ship->order->item->unit }}</td>
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

@section('js')
    <script type="text/javascript">
        $(".form_datetime").datetimepicker();
        $('.arrival-date').hide();
        $('.js-example-basic-single').select2({ width: '100%' }); // TODO: wrap them in document ready
        $(document).ready(function () {
            $('.shipment-select').on('change', function (eve) {
                switch ($(this).val()) {
                    case 'arrived':
                        $('.arrival-date').show();
                        break;
                    default:
                        $('.arrival-date').hide();
                        break;
                }

            });
            $('.modal-button').click(function() {
                $('.shipment-select').val('on_hold');
                $('.arrival-date').hide();
            });
        })

    </script>
@append
