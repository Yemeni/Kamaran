@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Add/Edit Category</h1>

@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="box-header with-border">
                            <h3 class="box-title">Category Details:</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" _lpchecked="1">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="">Category Name:</label>
                                    <input type="text" class="form-control" id="">
                                </div>

                                <div class="form-group">
                                    <label>Category Description</label>
                                    <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="">Assign Manager:</label>
                                    <select class="js-example-basic-single form-control">
                                        <option value="">Ahmed Saleh</option>
                                        <option value="">Ali Saddam</option>
                                    </select>
                                </div>

                                <div></div>

                                @section('js')
                                    <script>
                                        // select2 auto complete
                                        $(document).ready(function() {
                                            $('.js-example-basic-single').select2();
                                        });
                                    </script>
                                @append
                            </div>

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

