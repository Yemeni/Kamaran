@extends('adminlte::page')

@section('title', 'Inventory Report')

@section('content_header')
    <h1>Print Reports</h1>

@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                {{--<div class="div-header">--}}
                    {{--<img src="{{ asset('resources/Report Page Header.jpg') }}">--}}
                    {{--<div class="box-header">--}}
                        {{--<h3 class="box-title">Report of: Department of Bla - Item Blue Tobacco - All Transactions</h3>--}}
                    {{--</div>--}}
                {{--</div>--}}
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th colspan="7">
                                    <img src="{{ asset('resources/Report Page Header.jpg') }}">
                                    <p>Report of: {{ $reportHeader['category'] }} - {{ $reportHeader['item'] }} - {{ $reportHeader['status'] }} Transactions {{ $reportHeader['fromDate'] }} {{ $reportHeader['toDate'] }}</p>
                                </th>
                            </tr>
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
                        <tfoot>
                            <tr>
                                <td>
                                    @if(isset(Auth::user()->name))
                                        <div>Printed by
                                            <span>{{ auth()->user()->name }}</span>
                                            on {{ \Carbon\Carbon::now()->format('Y-m-d H:i') }}
                                        </div>
                                    @endif
                                </td>
                            </tr>
                        </tfoot>
                        <tbody>
                        @foreach($inventories as $inv)
                            <tr>
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
                                <td>{{ $inv->date->format('Y-m-d H:i') }}</td>
                                <td>{{ $inv->quantity }} {{ $inv->item->unit }}</td>
                            </tr>
                        @endforeach

                        @foreach($result as $res)
                            <tr>
                                <td colspan="4">Current {{ $res['name'] }} in Inventory</td>
                                <td colspan="3">{{ $res['total'] }} {{ $res['unit'] }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>


        </div>
    </div>


@stop

@section('css')
    <style>


        @media print
        {
            table { page-break-after:auto }
            tr    { page-break-inside:avoid; page-break-after:auto }
            td    { page-break-inside:avoid; page-break-after:auto }
            thead { display:table-header-group }
            tfoot { display:table-footer-group }
        }

        /*@media screen {*/
            /*div.div-header {*/
                /*display: none;*/
            /*}*/
        /*}*/
        /*@media print {*/
            /*div.div-header {*/
                /*position: fixed;*/
                /*top: 0;*/
            /*}*/
        /*}*/

    </style>
@append

@section('js')
    <script>
        $( document ).ready(function() {
            setTimeout(
                function()
                {
                    function method1(){
                        $(document).ready(function (eve) {
                            window.print();
                        });
                    }

                    function method2(){
                        location.assign('/inventory');
                    }

                    $.ajax({
                        url:method1(),
                        success:function(){
                            method2();
                        }
                    })

                }, 200);

        });


//        $(document).ready(function(){$("table tbody th, table tbody td").wrapInner("<div></div>");});

    </script>
@append