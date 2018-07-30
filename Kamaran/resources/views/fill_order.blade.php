@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Fill Order</h1>

@stop

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="box-header with-border">
                        <h3 class="box-title">Order details:</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" _lpchecked="1">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="">Date:</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" id="datepicker">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Letter:</label>
                                <select class="form-control">
                                    <option>option 1</option>
                                    <option>option 2</option>
                                    <option>option 3</option>
                                    <option>option 4</option>
                                    <option>option 5</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Supplier Name:</label>
                                <select class="js-example-basic-single form-control">
                                    <option value="">Something .co</option>
                                    <option value="">Company XYZ .limted</option>
                                </select>
                            </div>
                            @section('js')
                                <script>
                                    // select2 auto complete
                                    $(document).ready(function() {
                                        $('.js-example-basic-single').select2();
                                    });
                                </script>
                            @append
                            <div class="form-group">
                                <label>Textarea</label>
                                <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                            </div>
                            <div></div>

                            <!-- Custom Tabs -->
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Item 1</a></li>
                                    <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Item 2</a></li>
                                    <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Item 3</a></li>
                                    <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-plus"></i> Add Item</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1">
                                        <div class="form-group">
                                            <label for="">Item:</label>
                                                <input type="text" disabled="" class="form-control" id="">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Quantity:</label>
                                            <input type="text" class="form-control" id="">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Cost:</label>
                                            <input type="text" class="form-control" id="">
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="tab_2">

                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="tab_3">

                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div>
                            <!-- nav-tabs-custom -->

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