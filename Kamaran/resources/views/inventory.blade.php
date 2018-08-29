@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Inventory Reports</h1>

@stop

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div style="padding:10px;">
                    Filter by:
                    <form class="form-inline" action="{{ url('/inventory#trans') }}" autocomplete="off">
                        <div class="form-group">
                            <select name="category_id" class="js-example-basic-single-item form-control">
                                @if(auth()->user()->withoutCategory())
                                    <option selected disabled>Filter by category</option>
                                    <option value="all">All Categories</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                @else
                                    <option  value="{{ auth()->user()->category_id }}" selected disabled  >{{ \App\Category::where('id', auth()->user()->category_id)->first()->name }} </option>
                                @endif

                            </select>
                        </div>

                        <div class="form-group">
                            <select name="item_id[]" class="js-example-basic-single-item form-control" multiple="multiple">
                                <option {{ is_null(request('item_id')) ? 'selected' : '' }} disabled>Filter by item</option>
                                {{--{{ !in_array($item->id, request('item_id')) ? 'selected' : '' }}--}}
                                {{--<option selected disabled>Filter by item</option>--}}
                                {{--<option value="all">All Items</option>--}}
                                @foreach($items as $item)
                                    {{--<option value="{{ $item->id }}" {{ in_array($item->id, request('item_id')) ? 'selected' : '' }}>{{ $item->name }}</option>--}}
                                    <option value="{{ $item->id }}" {{ !is_null(request('item_id')) ? in_array($item->id, request('item_id')) ? 'selected' : '' : ''}}>{{ $item->name }}</option>
                                    {{--<option value="item_id[{{ $item->id }}]" >{{ $item->name }}</option>--}}
                                    {{--<option value="{{ $item->id }}" >{{ $item->name }}</option>--}}
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <select name="status" class="js-example-basic-single-item form-control">
                                <option selected disabled>Filter by transaction type</option>
                                <option value="all">All Transaction types</option>
                                <option {{ request('status') == 'voucher' ? 'selected' : '' }} value="voucher">In Stock
                                </option>
                                <option {{ request('status') == 'on_hold' ? 'selected' : '' }} value="on_hold">On Hold
                                </option>
                                <option {{ request('status') == 'consume' ? 'selected' : '' }} value="consume">Consume
                                </option>
                                <option {{ request('status') == 'initial_balance' ? 'selected' : '' }} value="initial_balance">
                                    Initial Balance
                                </option>
                                <option {{ request('status') == 'returns' ? 'selected' : '' }} value="returns">Returns
                                </option>
                                <option {{ request('status') == 'surplus' ? 'selected' : '' }} value="surplus">Surplus
                                </option>
                                <option {{ request('status') == 'shortage' ? 'selected' : '' }} value="shortage">
                                    Shortage
                                </option>
                                <option {{ request('status') == 'normal_shortage' ? 'selected' : '' }} value="normal_shortage">
                                    Normal Shortage
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text"
                                       name="from"
                                       value="{{ request()->has('from') ? request('from') : '' }}"
                                       placeholder="Date from"
                                       class="form-control pull-right input-append date form_datetime"
                                       id="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text"
                                       name="to"
                                       value="{{ request()->has('to') ? request('to') : '' }}"
                                       placeholder="Date to"
                                       class="form-control pull-right input-append date form_datetime"
                                       id="">
                            </div>
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
                <div id="trans  " class="box-body table-responsive">
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
                        @foreach($inventories as $inv)
                            <tr
                                    @switch($inv->transaction_type)
                                        @case('voucher')
                                        @case('initial_balance')
                                        @case('surplus')
                                            class="success"
                                            @break

                                        @case('consume')
                                        @case('shortage')
                                        @case('normal_shortage')
                                            class="danger"
                                            @break

                                        @default
                                            class="info"
                                    @endswitch
                            >
                                <td>{{ $inv->id }}</td>
                                <td>
                                    @switch($inv->transaction_type)
                                        @case('voucher')
                                            In Stock
                                        @break

                                        @case('initial_balance')
                                            Initial Balance
                                        @break

                                        @case('surplus')
                                            Surplus
                                        @break

                                        @case('consume')
                                            Consume
                                        @break
                                        @case('shortage')
                                            Shortage
                                        @break
                                        @case('normal_shortage')
                                            Normal Shortage
                                        @break

                                        @default
                                            Undefined
                                    @endswitch
                                </td>
                                <td>{{ $inv->category->name }}</td>
                                <td>{{ $inv->item->name }}</td>
                                <td>{{ $inv->user->name }}</td>
                                <td>{{ $inv->date->format('Y-m-d') }}</td>
                                <td>{{ $inv->quantity }} {{ $inv->item->unit }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div style="float:right;">
                        <a href="{{ url('/inventory/print') }}" class="btn btn-default">
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

                    $(".form_datetime").datetimepicker();
                })
            </script>

@append