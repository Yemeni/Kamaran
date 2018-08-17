@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Review Orders</h1>

@stop

@section('content')

    <div class="row">
        <div class="col-xs-12">
            @alert
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Pending Orders</h3>

                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table class="table table-hover datatables">
                        <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Employee</th>
                            <th>Date</th>
                            <th>Letter of Credit</th>
                            <th>Supplier</th>
                            <th>Category</th>
                            <th>Item</th>
                            <th>Quantity</th>
                            <th>Cost per Unit</th>
                            <th>Total Cost</th>
                            <th>Comment</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            if (! auth()->user()->isAdmin()){
                                $pendingOrders = $pendingOrders->where('category_id', auth()->user()->category_id);
                            }
                        @endphp
                        @foreach($pendingOrders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->user->name }}</td>

                                <td>{{ $order->date->format('d-m-y') }}</td>
                                <td>{{ strtoupper($order->letter_of_credit) }}</td>
                                <td>{{ $order->supplier->name }}</td>
                                <td>{{ $order->category->name }}</td>
                                <td>{{ $order->item->name }}</td>
                                <td>{{ $order->quantity }} {{ $order->item->unit }}</td>
                                <td>{{ number_format($order->cost) }} $</td>
                                <td>{{ number_format($order->cost * $order->quantity) }} $</td>
                                <td>{{ $order->comment ?? '-' }}</td>
                                {{--<td>Ahmed Ali</td>--}}
                                {{--<td>11-7-2018</td>--}}
                                {{--<td>CIF</td>--}}
                                {{--<td>XYZ Limited</td>--}}
                                {{--<td>Department of Raw Materials</td>--}}
                                {{--<td>Tobacco type V</td>--}}
                                {{--<td>100.0 KG</td>--}}
                                {{--<td>50$</td>--}}
                                {{--<td>They will give 5% discount the next time we order</td>--}}
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
                                                <a class="dropdown-item"
                                                   href="{{ url('/order/'.$order->id.'/approve') }}">
                                                    <i class="fa fa-fw fa-check "></i>
                                                    Approve
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item"
                                                   href="{{ url('/order/'.$order->id.'/cancel') }}">
                                                    <i class="fa fa-fw fa-times "></i>
                                                    Cancel
                                                </a>
                                            </li>
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
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Cancelled Orders</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table class="table table-hover datatables">
                        <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Employee</th>
                            <th>Date</th>
                            <th>Letter of Credit</th>
                            <th>Supplier</th>
                            <th>Category</th>
                            <th>Item</th>
                            <th>Quantity</th>
                            <th>Cost</th>
                            <th>Comment</th>
                            {{--<th></th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            if (! auth()->user()->isAdmin()){
                                $cancelledOrders = $cancelledOrders->where('category_id', auth()->user()->category_id);
                            }
                        @endphp
                        @foreach($cancelledOrders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->user->name }}</td>
                                <td>{{ $order->date->format('d-m-y') }}</td>
                                <td>{{ strtoupper($order->letter_of_credit) }}</td>
                                <td>{{ $order->supplier->name }}</td>
                                <td>{{ $order->category->name }}</td>
                                <td>{{ $order->item->name }}</td>
                                <td>{{ $order->quantity }} {{ $order->item->unit }}</td>
                                <td>{{ $order->cost }} $</td>
                                <td>{{ $order->comment ?? '-' }}</td>
                                {{--<td>Ahmed Ali</td>--}}
                                {{--<td>11-7-2018</td>--}}
                                {{--<td>CIF</td>--}}
                                {{--<td>XYZ Limited</td>--}}
                                {{--<td>Department of Raw Materials</td>--}}
                                {{--<td>Tobacco type V</td>--}}
                                {{--<td>100.0 KG</td>--}}
                                {{--<td>50$</td>--}}
                                {{--<td>They will give 5% discount the next time we order</td>--}}
                                {{--<td>--}}
                                {{--<a href="">--}}
                                {{--<i class="fa fa-fw fa-check "></i>--}}
                                {{--Approve--}}
                                {{--</a>--}}
                                {{--<a href="">--}}
                                {{--<i class="fa fa-fw fa-times "></i>--}}
                                {{--Cancel--}}
                                {{--</a>--}}
                                {{--<a href="">--}}
                                {{--<i class="fa fa-fw fa-sticky-note "></i>--}}
                                {{--Other--}}
                                {{--</a>--}}
                                {{--</td>--}}
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
                    <h3 class="box-title">Approved Orders</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table class="table table-hover datatables">
                        <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Employee</th>
                            <th>Date</th>
                            <th>Letter of Credit</th>
                            <th>Supplier</th>
                            <th>Category</th>
                            <th>Item</th>
                            <th>Quantity</th>
                            <th>Cost</th>
                            <th>Approved Date</th>
                            <th>Comment</th>
                            <th>Action</th>
                            {{--<th></th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            if (! auth()->user()->isAdmin()){
                                $approvedOrders = $approvedOrders->where('category_id', auth()->user()->category_id);
                            }
                        @endphp
                        @foreach($approvedOrders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->user->name }}</td>
                                <td>{{ $order->date->format('d-m-y') }}</td>
                                <td>{{ strtoupper($order->letter_of_credit) }}</td>
                                <td>{{ $order->supplier->name }}</td>
                                <td>{{ $order->category->name }}</td>
                                <td>{{ $order->item->name }}</td>
                                <td>{{ $order->quantity }} {{ $order->item->unit }}</td>
                                <td>{{ $order->cost }} $</td>
                                <td>{{ $order->approval_date->format('d-m-y') }}</td>
                                <td>{{ $order->comment ?? '-' }}</td>
                                <td>
                                    @if($order->haveCancelledShipments())
                                        <button type="button" class="btn btn-info btn-sm">Ship
                                        </button>
                                    @else
                                        -
                                    @endif
                                </td>
                                {{--<td>Ahmed Ali</td>--}}
                                {{--<td>11-7-2018</td>--}}
                                {{--<td>CIF</td>--}}
                                {{--<td>XYZ Limited</td>--}}
                                {{--<td>Department of Raw Materials</td>--}}
                                {{--<td>Tobacco type V</td>--}}
                                {{--<td>100.0 KG</td>--}}
                                {{--<td>50$</td>--}}
                                {{--<td>They will give 5% discount the next time we order</td>--}}
                                {{--<td>--}}
                                {{--<a href="">--}}
                                {{--<i class="fa fa-fw fa-check "></i>--}}
                                {{--Approve--}}
                                {{--</a>--}}
                                {{--<a href="">--}}
                                {{--<i class="fa fa-fw fa-times "></i>--}}
                                {{--Cancel--}}
                                {{--</a>--}}
                                {{--<a href="">--}}
                                {{--<i class="fa fa-fw fa-sticky-note "></i>--}}
                                {{--Other--}}
                                {{--</a>--}}
                                {{--</td>--}}
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