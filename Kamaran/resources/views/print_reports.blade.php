@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Print Reports</h1>

@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <img src="{{ asset('resources/Report Page Header.jpg') }}">
                <div class="box-header">
                    <h3 class="box-title">Report of: Department of Bla - Item Blue Tobacco - All Transactions</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <th>Transaction ID</th>
                            <th>Transaction Type</th>
                            <th>Category</th>
                            <th>Item</th>
                            <th>Employee</th>
                            <th>Date</th>
                            <th>Quantity</th>

                        </tr>
                        @foreach($inventories as $inv)
                            <tr>
                                <td>{{ $inv->id }}</td>
                                <td>{{ $inv->transaction_type }}</td>
                                <td>{{ $inv->category->name }}</td>
                                <td>{{ $inv->item->name }}</td>
                                <td>{{ $inv->user->name }}</td>
                                <td>{{ $inv->date->format('Y-m-d H:i') }}</td>
                                <td>{{ $inv->quantity }} {{ $inv->item->unit }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="4">Total Inventory</td>
                            <td colspan="3">{{ $result }} units</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <div>Printed by
                <span>Hammoood Ali</span>
                on 1st March 2018 - 04:40
            </div>

        </div>
    </div>


@stop

@section('css')
    <style>
        footer {
            display: none;
        }
    </style>
@append

@section('js')
    <script>
        $(document).ready(function (eve) {
            window.print();
        });
    </script>
@append