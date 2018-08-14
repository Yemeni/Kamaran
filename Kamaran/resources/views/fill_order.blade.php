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
                        <form role="form" action="{{ url('/order') }}" method="post">
                            @csrf

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
                                               id="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="">Letter:</label>
                                    <select name="letter_of_credit" class="form-control">
                                        <option>cif</option>
                                        <option>cf</option>
                                        <option>fob</option>
                                        <option>cfr</option>
                                        <option>other</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Supplier Name:</label>
                                    <select name="supplier_id" class="js-example-basic-single form-control">
                                        <option selected disabled> Select a Supplier</option>
                                        @foreach($suppliers as $supplier)
                                            <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Comment</label>
                                    <textarea name="comment"
                                              class="form-control"
                                              rows="3"
                                              placeholder="Enter ..."></textarea>
                                </div>
                                <div></div>

                                <div class="form-group">
                                    <label for="">Item:</label>
                                    <select name="item_id" class="js-example-basic-single-item form-control">
                                        <option selected disabled>Choose the Supplier first</option>
                                    </select>
                                </div>

                                @if(auth()->user()->isAdmin())
                                    <div class="form-group">
                                        <label for="">Categories:</label>
                                        <select name="category_id" class="js-example-basic-single form-control">
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif

                                <div class="form-group">
                                    <label for="">Quantity:</label>
                                    <input name="quantity" type="number" class="form-control calc" id="">
                                </div>
                                <div class="form-group">
                                    <label for="">Cost:</label>
                                    <input type="number" name="cost" class="form-control calc" id="">
                                </div>
                                <div class="form-group">
                                    <label for="">Total Cost:</label>&nbsp;
                                    <span id="total">0</span>
                                    $
                                </div>

                                <!-- /.box-body -->

                                <div class="box-footer">
                                    <a href="{{ url('/review_orders') }}" class="btn btn-default">Cancel</a>
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

@section('adminlte_js')

    <script>
        $(document).ready(function () {

            $('.calc').change(function () {
                var total = 1;
                $('.calc').each(function () {
                    if ($(this).val() != '') {
                        total *= parseInt($(this).val());
                    }
                });
                $('#total').html(total);
            });

            $(".form_datetime").datetimepicker();

            $('.js-example-basic-single').select2();

            $('select[name="supplier_id"]').on('change.select2', function (eve) {
                $.get("/supplier/" + $(this).val() + "/items", function (data, status) {
                    $('.js-example-basic-single-item').select2({
                        data: JSON.parse(data)
                    });
                });
            })
        })
    </script>

@endsection