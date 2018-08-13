@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Add/Edit Supplier</h1>

@stop

@section('content')
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-xs-8">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Supplier Details</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
                <div class="form-group">

                      <label for="exampleInputEmail1">name</label>
                      <input type="name" class="form-control" id="exampleInputname" placeholder="Enter name">
                        <label for="exampleInputEmail1">address</label>


                  <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                </div>
                          <label for="exampleInputEmail1">Phone</label>
                          <input type="phone" class="form-control" id="exampleInputphone" placeholder="Enter phone">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                </div>
                <div class="form-group">

                </div>

                <div class="checkbox">
                  <label>
                  
                  </label>
                </div>
              <!-- /.box-body -->

                <div class="box-footer">
                    <button type="clear" class="btn btn-default ">Cancel</button>
                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
                </div>
            </form>
          </div>
          <!-- /.box -->
    </div>
    <div class="col-md-2"></div>


</div>

@stop
