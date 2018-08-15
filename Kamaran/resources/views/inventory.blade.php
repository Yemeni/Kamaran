@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Inventory</h1>

@stop

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">On Hold Transactions</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table class="table table-hover datatables">
                        <thead>
                        <tr>
                            <th>Transaction ID</th>
                            <th>Employee</th>
                            <th>Date</th>
                            <th>Quantity</th>
                            <th>Comment</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($onHold as $inv)
                            <tr>
                                <td>{{ $inv->id }}</td>
                                <td>{{ $inv->user->name ?? '-' }}</td>
                                <td>{{ $inv->date ? $inv->date->format('Y-m-d H:i') : '-' }}</td>
                                <td>{{ $inv->quantity }} {{ $inv->shipment->order->item->unit }}</td>
                                <td>
                                    <a href="{{ url('/inventory/'.$inv->id.'/approved') }}" class="btn btn-info btn-sm">Approve</a>
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
                <div style="padding:10px;">
                    Filter by:
                    <form class="form-inline" action="">
                        <div class="form-group">
                            <label for="">Category:</label>
                            <select name="" class="js-example-basic-single-item form-control">
                                <option>Blue Grape Bla</option>
                                <option>Red Tobacco Bla</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Item:</label>
                            <select name="item_id" class="js-example-basic-single-item form-control">
                                <option>All Items</option>
                                <option>Red Tobacco Bla</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Status:</label>
                            <select name="" class="js-example-basic-single-item form-control">
                                <option>All Transactions</option>
                                <option>Blue Grape Bla</option>
                                <option>Red Tobacco Bla</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-default">Filter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Transactions</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table class="table table-hover datatables">
                        <thead>
                        <tr>
                            <th>Transaction ID</th>
                            <th>Transaction Type</th>
                            <th>Category</th>
                            <th>Item</th>
                            <th>Employee</th>
                            <th>Date</th>
                            <th>Quantity</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>514</td>
                            <td>Consume</td>
                            <td>Department of Bla</td>
                            <td>Blue Tobacco xyz</td>
                            <td>Ahmed Ali</td>
                            <td>2088-2-11</td>
                            <td>500000</td>
                        </tr>
                        </tbody>
                    </table>
                    <div style="float:right;">
                        <a href="">
                            <i class="fa fa-fw fa-print "></i>
                            <span>Print</span>
                        </a>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>

@stop



@section('js')

    <script>
        $(document).ready(function () {
            $('.js-example-basic-single-item').select2();
        })
    </script>

@append