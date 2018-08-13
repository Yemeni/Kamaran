@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Print Reports</h1>

@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="box-header with-border">
                            <h3 class="box-title">Printing conditions:</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" _lpchecked="1">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="">Department:</label> <!-- for Admin only, for employees auto select according to their category/department-->
                                    <select class="form-control">
                                        <option value="">Department ABC</option>
                                        <option value="">Department Raw Materials</option>
                                    </select>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="">Item Name:</label>
                                    <select class="js-example-basic-single-item form-control">
                                        <option value="">Tobacco xyz</option>
                                        <option value="">Something xyz</option>
                                    </select>
                                    </span>
                                </div>
                                @section('js')
                                    <script>
                                        // select2 auto complete
                                        $(document).ready(function() {
                                            $('.js-example-basic-single-item').select2();
                                        });
                                    </script>
                                @append

                                <div class="form-group">
                                    <label for="">Conditions:</label>
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-10">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox">
                                                    Order Status
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox">
                                                    Shipments
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox">
                                                    Inventory Transactions In
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox">
                                                    Inventory Transactions Out
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox">
                                                    Total Available in Inventory
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                        <div class="form-group">
                                            <label for="">From Date:</label>
                                            <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-6">
                                                    <div class="input-group date">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </div>
                                                        <input type="text" class="form-control pull-right" id="datepicker">
                                                    </div>
                                                </div>
                                                <div class="col-md-5"></div>
                                            </div>
                                        </div>
                                    <div class="form-group">
                                        <label for="">To Date:</label>
                                        <div class="row">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-6">
                                                <div class="input-group date">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                    <input type="text" class="form-control pull-right" id="datepicker">
                                                </div>
                                            </div>
                                            <div class="col-md-5"></div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="box-footer">
                                <button type="clear" class="btn btn-default ">Cancel</button>
                                <button type="submit" class="btn btn-primary pull-right">Print</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>


@stop