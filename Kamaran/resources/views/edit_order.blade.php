@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Edit Order</h1>

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
                        <form role="form" action="{{ url('/order/'.$order->id) }}" method="post" autocomplete="off">
                            @csrf
                            @method("PUT")

                            <div class="box-body">
                                <div class="form-group">
                                    <label for="">Date:</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text"
                                               name="date"
                                               class="form-control pull-right input-append date form_datetime"
                                               id="" value="{{ $order->date->format('Y-m-d H:i') }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="">Letter:</label>
                                    <select name="letter_of_credit" class="form-control js-example-basic-single">
                                        <option {{ $order->letter_of_credit == 'cif' ? 'selected' : '' }}>cif</option>
                                        <option {{ $order->letter_of_credit == 'cf' ? 'selected' : '' }}>cf</option>
                                        <option {{ $order->letter_of_credit == 'fob' ? 'selected' : '' }}>fob</option>
                                        <option {{ $order->letter_of_credit == 'cfr' ? 'selected' : '' }}>cfr</option>
                                        <option {{ $order->letter_of_credit == 'other' ? 'selected' : '' }}>other
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Supplier Name:</label>
                                    <select name="supplier_id" class="js-example-basic-single form-control">
                                        <option selected disabled> Select a Supplier</option>
                                        @foreach($suppliers as $supplier)
                                            <option value="{{ $supplier->id }}" {{ $order->supplier_id == $supplier->id ? 'selected' : '' }}>{{ $supplier->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Comment</label>
                                    <textarea name="comment"
                                              class="form-control"
                                              rows="3"
                                              placeholder="Enter ...">{{ $order->comment }}</textarea>
                                </div>
                                <div></div>

                                <div class="form-group">
                                    <label for="">Item:</label>
                                    <select name="item_id" class="js-example-basic-single-item js-example-basic-single form-control">
                                        @foreach($suppliers->where('id', $order->supplier_id)->first()->items as $item)
                                            @if(auth()->user()->isAdmin())
                                            <option value="{{ $item->id }}" {{ $order->item_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                            @elseif($item->category_id == auth()->user()->getCategoryId())
                                                <option value="{{ $item->id }}" {{ $order->item_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                                {{--@if(auth()->user()->isAdmin())--}}
                                    {{--<div class="form-group">--}}
                                        {{--<label for="">Categories:</label>--}}
                                        {{--<select name="category_id" class="js-example-basic-single form-control">--}}
                                            {{--@foreach($categories as $category)--}}
                                                {{--<option value="{{ $category->id }}" {{ $order->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>--}}
                                            {{--@endforeach--}}
                                        {{--</select>--}}
                                    {{--</div>--}}
                                {{--@endif--}}

                                <div class="form-group">
                                    <label for="">Quantity:</label>
                                    <input name="quantity" step="0.01" value="{{ $order->quantity }}" type="number" class="form-control calc" id="">
                                </div>
                                <div class="form-group">
                                    <label for="">Cost:</label>
                                    <input type="number" step="0.01" name="cost" value="{{ $order->cost }}" class="form-control calc" id="">
                                </div>
                                <div class="form-group">
                                    <label for="">Total Cost:</label>&nbsp;
                                    <span id="total">0</span>
                                    $
                                </div>

                                <!-- /.box-body -->

                                <div class="box-footer">
                                    <a href="{{ auth()->user()->isAdmin() || auth()->user()->isManager() ? url('/review_orders') : url('/order_status') }}" class="btn btn-default">Cancel</a>
                                    <button type="submit" class="btn btn-primary pull-right">Update</button>
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
        $(document).ready(function () {

            var cost = $('input[name="cost"]').val();
            var quantity = $('input[name="quantity"]').val();
            $('#total').html(cost * quantity);

            $('.calc').change(function () {
                var total = 1;
                $('.calc').each(function () {
                    if ($(this).val() != '') {
                        total *= parseFloat($(this).val());
                    }
                });
                $('#total').html(total);
            });

            $(".form_datetime").datetimepicker();

            $('.js-example-basic-single').select2();

            $('select[name="supplier_id"]').on('change.select2', function (eve) {
                var jsonData = [];
                @foreach($suppliers as $supplier)
                        @foreach($supplier->items as $item)

                if( '{{ $supplier->id }}' ==  $(this).val()){
                        @if( auth()->user()->isAdmin() ){
                        jsonData.push( { 'id':'{{ $item->id }}', 'text':'{{ $item->name }}' } );
                    }
                        @else{
                        if( '{{ $item->category_id }}' == '{{ auth()->user()->category_id }}'){
                            jsonData.push( { 'id':'{{ $item->id }}', 'text':'{{ $item->name }}' } );
                        }
                    }
                    @endif

                }

                        @endforeach
                        @endforeach

                var myJsonString = JSON.stringify(jsonData);
                $('.js-example-basic-single-item').empty();
                $('.js-example-basic-single-item').select2({
                    data: JSON.parse(myJsonString)
                });
            })
        })
    </script>

@append