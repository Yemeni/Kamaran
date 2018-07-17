@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Performance</h1>

@stop

@section('content')



    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Inventory</h3>

                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody><tr>
                            <th>Item ID</th>
                            <th>Item Name</th>
                            <th>Current Quantity</th>
                            <th>Previous Quantity</th>
                            <th>Change %</th>
                        </tr>
                        <tr>
                            <td>153</td>
                            <td>Tobbaco Type F</td>
                            <td>11,455 tones</td>
                            <td>11,670 tones</td>
                            <td>+0.8%</td>
                        </tr>
                        <tr>
                            <td>153</td>
                            <td>Tobbaco Type F</td>
                            <td>11,455 tones</td>
                            <td>11,670 tones</td>
                            <td>+0.8%</td>
                        </tr>
                        <tr>
                            <td>153</td>
                            <td>Tobbaco Type F</td>
                            <td>11,455 tones</td>
                            <td>11,670 tones</td>
                            <td>+0.8%</td>
                        </tr>
                        <tr>
                            <td>153</td>
                            <td>Tobbaco Type F</td>
                            <td>11,455 tones</td>
                            <td>11,670 tones</td>
                            <td>+0.8%</td>
                        </tr>
                        </tbody></table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>

@stop