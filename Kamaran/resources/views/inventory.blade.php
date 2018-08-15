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
                                <td>{{ $inv->quantity }} {{ $inv->item->unit }}</td>
                                <td>{{ $inv->comment ?? '-' }}</td>
                                <td>
                                    <a href="{{ url('/inventory/'.$inv->id.'/approved') }}" class="btn btn-info btn-sm">
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

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div style="padding:10px;">
                    Filter by:
                    <form class="form-inline" action="{{ url('/inventory#trans') }}">
                        <div class="form-group">
                            <label for="">Category:</label>
                            <select name="category_id" class="js-example-basic-single-item form-control">
                                <option selected disabled>Filter by category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Item:</label>
                            <select name="item_id" class="js-example-basic-single-item form-control">
                                <option selected disabled>Filter by item</option>
                                @foreach($items as $item)
                                    <option value="{{ $item->id }}" {{ request('item_id') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Status:</label>
                            <select name="status" class="js-example-basic-single-item form-control">
                                <option selected disabled>Filter by transaction type</option>
                                <option {{ request('status') == 'voucher' ? 'selected' : '' }} value="voucher">voucher
                                </option>
                                <option {{ request('status') == 'on_hold' ? 'selected' : '' }} value="on_hold">on hold
                                </option>
                                <option {{ request('status') == 'consume' ? 'selected' : '' }} value="consume">consume
                                </option>
                                <option {{ request('status') == 'initial_balance' ? 'selected' : '' }} value="initial_balance">
                                    initial balance
                                </option>
                                <option {{ request('status') == 'returns' ? 'selected' : '' }} value="returns">returns
                                </option>
                                <option {{ request('status') == 'surplus' ? 'selected' : '' }} value="surplus">surplus
                                </option>
                                <option {{ request('status') == 'shortage' ? 'selected' : '' }} value="shortage">
                                    shortage
                                </option>
                                <option {{ request('status') == 'normal_shortage' ? 'selected' : '' }} value="normal_shortage">
                                    normal shortage
                                </option>
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
                <div id="trans" class="box-body table-responsive">
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
                            <th>Comment</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($inventories as $inv)
                            <tr>
                                <td>{{ $inv->id }}</td>
                                <td>{{ $inv->transaction_type }}</td>
                                <td>{{ $inv->category->name }}</td>
                                <td>{{ $inv->item->name }}</td>
                                <td>{{ $inv->user->name }}</td>
                                <td>{{ $inv->date->format('Y-m-d H:i') }}</td>
                                <td>{{ $inv->quantity }} {{ $inv->item->unit }}</td>
                                <td>{{ $inv->comment ?? '-' }}</td>
                                <td>
                                    <a href="" class="btn btn-warning">Edit</a>
                                    <button onclick="" class="btn btn-danger">Delete</button>
                                    <form id="delete1" action="" method="post">
                                        <input type="hidden" name="_token" value="">
                                        <input type="hidden" name="_method" value="DELETE">
                                    </form>
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



@section('js')

    <script>
        $(document).ready(function () {
            $('.js-example-basic-single-item').select2();
        })
    </script>

@append