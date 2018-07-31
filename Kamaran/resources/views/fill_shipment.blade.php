@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Make a Shipment</h1>

@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="box-header with-border">
                            <h3 class="box-title">Shipment details:</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" _lpchecked="1">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="">Arrival Date:</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control pull-right" id="datepicker">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Order:</label>
                                    <select class="js-example-basic-single-order form-control">
                                        <option value="">114</option>
                                        <option value="">116</option>
                                    </select>
                                </span>
                                </div>
                                @section('js')
                                    <script>
                                        // select2 auto complete
                                        $(document).ready(function() {
                                            $('.js-example-basic-single-order').select2();
                                        });
                                    </script>
                                @append
                                <div class="form-group">
                                    <label for="">Quantity:</label>
                                    <input type="text" class="form-control" id="">
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
                                    <label for="">Danger Level:</label>
                                    <input type="text" disabled="" value="Flammable" class="form-control" id="">
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