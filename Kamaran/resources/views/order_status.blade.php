@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Orders Status</h1>
@stop

@section('content')

<div class="row">
        <div class="col-xs-12">
            @alert
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">My Pending Orders</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table class="table table-hover datatables">
                        <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Date</th>
                            <th>Letter of Credit</th>
                            <th>Supplier</th>
                            <th>Category</th>
                            <th>Item</th>
                            <th>Quantity</th>
                            <th>Cost per Unit</th>
                            <th>Total Cost</th>
                            <th>Status</th>
                            <th>Comment</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($pendingOrders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->date->format('d-m-y') }}</td>
                                <td>{{ strtoupper($order->letter_of_credit) }}</td>
                                <td>{{ $order->supplier->name }}</td>
                                <td>{{ $order->category->name }}</td>
                                <td>{{ $order->item->name }}</td>
                                <td>{{ $order->quantity }} {{ $order->item->unit }}</td>
                                <td>{{ ($order->cost) }} $</td>
                                <td>{{ number_format($order->cost * $order->quantity) }} $</td>
                                <td> {{ $order->order_status }} </td>
                                <td>{{ $order->comment ?? '-' }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle btn-sm"
                                                type="button"
                                                id="dropdownMenuButton"
                                                data-toggle="dropdown"
                                                aria-haspopup="true"
                                                aria-expanded="false">
                                            Change Status
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-right">

                                            <li>
                                                <a class="dropdown-item" href="{{ url('/order/'.$order->id.'/edit') }}">
                                                    <i class="fa fa-fw fa-pencil"></i>
                                                    Edit
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item"
                                                   href="{{ url('/order/'.$order->id.'/delete') }}">
                                                    <i class="fa fa-fw fa-trash"></i>
                                                    Delete
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
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
<div class="row">
    <div class="col-xs-12">
        @alert
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Reviewed Orders</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
                <table class="table table-hover datatables">
                    <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Date</th>
                        <th>Letter of Credit</th>
                        <th>Supplier</th>
                        <th>Category</th>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Cost per Unit</th>
                        <th>Total Cost</th>
                        <th>Status</th>
                        <th>Comment</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($reviewedOrders as $order)
                        <tr
                                @if($order->order_status == 'approved')
                                        class="success"
                                @else
                                        class="danger"
                                @endif
                        >
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->date->format('d-m-y') }}</td>
                            <td>{{ strtoupper($order->letter_of_credit) }}</td>
                            <td>{{ $order->supplier->name }}</td>
                            <td>{{ $order->category->name }}</td>
                            <td>{{ $order->item->name }}</td>
                            <td>{{ $order->quantity }} {{ $order->item->unit }}</td>
                            <td>{{ ($order->cost) }} $</td>
                            <td>{{ number_format($order->cost * $order->quantity) }} $</td>
                            <td> {{ $order->order_status }} </td>
                            <td>{{ $order->comment ?? '-' }}</td>
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
