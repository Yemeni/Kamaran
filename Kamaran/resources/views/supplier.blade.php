@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Add/Edit Supplier</h1>

@stop

@section('content')

<div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="box-header with-border">
                            <h3 class="box-title">Supplier details:</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" _lpchecked="1">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="">Name:</label>
                                    <input type="text" class="form-control" id="">
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Phone:</label>
                                    <input type="text" class="form-control" id="">
                                </div>
                                <div class="form-group">
                                    <label for="">Email:</label>
                                    <input type="text" class="form-control" id="">
                                </div>
                                <div></div>

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
