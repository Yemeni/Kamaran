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
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                    @endif
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{ url('/inventory') }}" method="post" autocomplete="off">
                            @csrf

                            <div class="box-body">
                                <div class="form-group">
                                    <label for="">Type:</label>
                                    <select name="transaction_type" class="form-control">
                                        {{--<option value="voucher">in stock--}}
                                        {{--</option>--}}
                                        <option value="on_hold">on hold
                                        </option>
                                        <option value="consume">consume
                                        </option>
                                        <option value="initial_balance">
                                            initial balance
                                        </option>
                                        <option value="returns">returns
                                        </option>
                                        <option value="surplus">surplus
                                        </option>
                                        <option value="shortage">
                                            shortage
                                        </option>
                                        <option value="normal_shortage">
                                            normal shortage
                                        </option>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="">Item:</label>
                                    <select name="item_id" class="js-example-basic-single form-control">
                                        @foreach($items as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Date:</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text"
                                               name="date"
                                               class="form-control pull-right input-append date form_datetime"
                                               id="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="">Quantity:</label>
                                    <input type="text" name="quantity" class="form-control" id="">
                                </div>

                                <div class="form-group">
                                    <label>Comment</label>
                                    <textarea class="form-control" name="comment" rows="3" placeholder="Enter ..."></textarea>
                                </div>

                                <!-- /.box-body -->

                                <div class="box-footer">
                                    <a href="/inventory" class="btn btn-default ">Cancel</a>
                                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
                                </div>

                            </div>



                        </form>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
        </div>
    </div>


@stop

@section('js')
    <script>
        // select2 auto complete
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
            $(".form_datetime").datetimepicker();
        });
    </script>
@append