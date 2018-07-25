@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Make a Transaction</h1>

@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="box-header with-border">
                            <h3 class="box-title">Transaction details:</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" _lpchecked="1">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="">Type:</label>
                                    <select class="form-control">
                                        <option>Voucher</option>
                                        <option>Consume</option>
                                        <option>Initial Balance</option>
                                        <option>Returns</option>
                                        <option>Surplus</option>
                                        <option>Shortage</option>
                                        <option>Normal Shortage</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Employee Name:</label>
                                    <input type="text" disabled="" value="Ahmed Ali" class="form-control" id="">
                                </div>
                                <div class="input-group input-group-sm">
                                    <label for="">Shipment:</label>
                                    <input type="text" disabled="" class="form-control">
                                    <span class="input-group-btn">
                                    <button type="button" class="btn btn-info btn-flat">Browse</button>
                                </span>
                                </div>
                                <div class="form-group">
                                    <label for="">Date:</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" disabled="" value="2018-5-15 12:30 PM" class="form-control pull-right" id="datepicker">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="">Quantity:</label>
                                    <input type="text" class="form-control" id="">
                                </div>

                                <div class="form-group">
                                    <label>Comment</label>
                                    <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                                </div>

                                <!-- /.box-body -->

                                <div class="box-footer">
                                    <button type="clear" class="btn btn-default ">Cancel</button>
                                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
                                </div>
                        </form>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
        </div>
    </div>


@stop