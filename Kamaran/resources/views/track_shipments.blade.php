@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')

    <h1>Track Shipments</h1>

@stop

@section('content')

    <div class="row">
        <div class="col-xs-12">
            @alert
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
                            <th>Supplier</th>
                            <th>Item</th>
                            <th>Staff</th>
                            <th>Quantity</th>
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
                                    {{ $ship->order->supplier->name }}
                                </td>
                                <td>
                                    {{ $ship->order->item->name }}
                                </td>
                                <td>
                                    {{ $ship->user->name }}
                                </td>
                                <td>{{ $ship->order->quantity }} {{ $ship->order->item->unit }}</td>
                                <td>
                                    <button type="button"
                                            class="btn btn-info btn-sm modal-button"
                                            data-toggle="modal"
                                            data-target="#myModal{{ $ship->id }}">Process
                                    </button>
                                </td>
                                <!-- Modal -->
                                <div id="myModal{{ $ship->id }}" class="modal fade" role="dialog">
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
                                                                       name="expected_date"
                                                                       class="form-control pull-right input-append date form_datetime"
                                                                       id="">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="">Status:</label>
                                                            <select name="shipment_status" class="form-control shipment-select js-example-basic-single">
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
                                                                {{--<option value="arrived" {{ $ship->shipment_status == 'arrived' ? 'selected' : '' }}>--}}
                                                                {{--Arrived--}}
                                                                {{--</option>--}}
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
        $(document).ready(function () {

            $(".form_datetime").datetimepicker();
            $('.js-example-basic-single').select2({ width: '100%' });

        });
    </script>
@append
