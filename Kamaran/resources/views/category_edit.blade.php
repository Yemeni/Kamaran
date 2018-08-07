@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Edit Category</h1>

@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            @if ($errors->any())
                <div class="box box-danger">
                    <div class="bo-body">
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif
            <div class="box box-primary">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="box-header with-border">
                            <h3 class="box-title">Category Details:</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" _lpchecked="1" action="{{ url('/category/'.$category->id) }}" method="post">
                            @csrf
                            @method("PUT")

                            <div class="box-body">
                                <div class="form-group">
                                    <label for="">Category Name:</label>
                                    <input type="text" name="name" value="{{ $category->name }}" class="form-control" id="">
                                </div>

                                <div class="form-group">
                                    <label>Category Description</label>
                                    <textarea class="form-control" name="comment" rows="3" placeholder="Enter ...">{{ $category->comment }}</textarea>
                                </div>

                                {{--<div class="form-group">--}}
                                    {{--<label for="">Assign Manager:</label>--}}
                                    {{--<select class="js-example-basic-single form-control">--}}
                                        {{--<option value="">Ahmed Saleh</option>--}}
                                        {{--<option value="">Ali Saddam</option>--}}
                                    {{--</select>--}}
                                {{--</div>--}}

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
                                <button type="reset" class="btn btn-default ">Cancel</button>
                                <button type="submit" class="btn btn-primary pull-right">Edit</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
        </div>
    </div>


@stop

