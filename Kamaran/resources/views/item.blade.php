@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Add/Edit Item</h1>

@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="box-header with-border">
                            <h3 class="box-title">Item details:</h3>
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
                                    <label for="">Category:</label>
                                    <select class="form-control">
                                        <option>Department of Something</option>
                                        <option>Department of Raw Materials</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Specification</label>
                                    <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Unit:</label>
                                    <select class="form-control">
                                        <option>KG</option>
                                        <option>Gram</option>
                                        <option>Tonne</option>
                                        <option>Liter</option>
                                        <option>Milliliter</option>
                                        <option>Barre</option>
                                        <option>Gallon</option>
                                        <option>Bottle</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Kilometer</option>
                                        <option>Cartons</option>
                                        <option>Pack</option>
                                        <option>Packet</option>
                                        <option>Box</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Danger Level:</label>
                                    <select class="form-control">
                                        <option>low</option>
                                        <option>flammable</option>
                                        <option>toxic</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Type:</label>
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
