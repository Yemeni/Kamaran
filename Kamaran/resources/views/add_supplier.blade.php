@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Add Supplier</h1>

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
                        <form role="form" action="{{ url('/supplier') }}" method="post">
                            @csrf

                            <div class="box-body">
                                <div class="form-group">
                                    <label for="">Name:</label>
                                    <input type="text" name="name" class="form-control" id="">
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea class="form-control"
                                              name="address"
                                              rows="3"
                                              placeholder="Enter ..."></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Phone:</label>
                                    <input type="text" name="phone" class="form-control" id="">
                                </div>
                                <div class="form-group">
                                    <label for="">Email:</label>
                                    <input type="email" name="email" class="form-control" id="">
                                </div>
                                <div></div>

                                <!-- Custom Tabs -->
                                <div class="nav-tabs-custom">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="active">
                                            <a href="#tab_1" data-toggle="tab" aria-expanded="true">Item 1</a>
                                        </li>
                                        <li class="pull-right add-tab">
                                            <a href="#" class="text-muted">
                                                <i class="fa fa-plus"></i>
                                                Add Items
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab_1">
                                            <div class="form-group">
                                                <label for="">Item Name:</label>
                                                <select name="item_id[]" class="js-example-basic-single form-control">
                                                    @foreach($items as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
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


@section('js')
    <script>
        // select2 auto complete
        $(document).ready(function () {
            $('.js-example-basic-single').select2();
        });

        // add new tab
        $(".nav-tabs").on("click", "a", function (e) {
            e.preventDefault();
            if (!$(this).hasClass('add-tab')) {
                $(this).tab('show');
            }
        })
            .on("click", "span", function () {
                var anchor = $(this).siblings('a');
                $(anchor.attr('href')).remove();
                $(this).parent().remove();
                $(".nav-tabs li").children('a').first().click();
            });

        $('.add-tab').click(function (e) {
            e.preventDefault();
            var id = $(".nav-tabs").children().length; //think about it ;)
            var tabId = 'tab_' + id;
            $(this).closest('li').before('<li><a href="#tab_' + id + '">Item ' + id + '</a> <span> x </span></li>');
            $('.tab-content').append('<div class="tab-pane" id="' + tabId + '">' +
                '<div class="form-group">' +
                '<label for="">Item Name:</label>' +
                '<select class="js-example-basic-single' + id + ' form-control" name="item_id[]">' +
                    @foreach($items as $item)
                        '<option value="{{ $item->id }}">{{ $item->name }}</option>' +
                    @endforeach
                        '</select>' +
                '</div>' +
                '</div>');
            $('.nav-tabs li:nth-child(' + id + ') a').click();

            $(document).ready(function () {
                $('.js-example-basic-single' + id).select2();
            });
        });
    </script>
@append

