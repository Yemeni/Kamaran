@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Incoming Shipments</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            @alert
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">On Hold Incoming Shipments</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table class="table table-hover datatables">
                        <thead>
                        <tr>
                            <th>Transaction ID</th>
                            <th>Invoice #</th>
                            <th>Category</th>
                            <th>Item</th>
                            <th>Employee</th>
                            <th>Date</th>
                            <th>Quantity</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($onHold as $inv)
                            <tr>
                                <td>{{ $inv->id }}</td>
                                <td>{{ $inv->shipment->invoice }}</td>
                                <td>{{ $inv->category->name }}</td>
                                <td>{{ $inv->item->name }}</td>
                                <td>{{ $inv->user->name ?? '-' }}</td>
                                <td>{{ $inv->date ? $inv->date->format('Y-m-d') : '-' }}</td>
                                <td>{{ $inv->quantity }} {{ $inv->item->unit }}</td>
                                <td>
                                    <a href="{{ url('/inventory_incoming_shipments/'.$inv->id.'/approved') }}" class="btn btn-info btn-sm">
                                        Approve
                                    </a>
                                </td>
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

