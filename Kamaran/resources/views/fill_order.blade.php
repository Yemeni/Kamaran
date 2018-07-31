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
                                    <option>cif</option>
                                    <option>cf</option>
                                    <option>fob</option>
                                    <option>cfr</option>
                                    <option>other</option>
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
                                    <li class="pull-right add-tab"><a href="#" class="text-muted"><i class="fa fa-plus"></i> Add Item</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1">
                                        <div class="form-group">
                                            <label for="">Item:</label>
                                            <select class="js-example-basic-single-item form-control">
                                                <option value="">Tobacco xyz</option>
                                                <option value="">Something xyz</option>
                                            </select>
                                        </div>
                                        @section('js')
                                            <script>
                                                // select2 auto complete
                                                $(document).ready(function() {
                                                    $('.js-example-basic-single-item').select2();
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
                                                    $(this).closest('li').before('<li><a href="#tab_' + id + '">Supplier ' + id +'</a> <span> x </span></li>');
                                                    $('.tab-content').append('<div class="tab-pane" id="' + tabId + '">' +
                                                        '<div class="form-group">' +
                                                            '<label for="">Supplier Name:</label>' +
                                                            '<select class="js-example-basic-single-item'+id +' form-control">' +
                                                                '<option value="">Tobbaco XYZ</option>' + // repopulate from database
                                                                '<option value="">Fire ABC</option>' +
                                                            '</select>' +
                                                        '</div>' +
                                                        '<div class="form-group">' +
                                                            '<label for="">Quantity:</label>' +
                                                            '<input type="text" class="form-control" id="">' +
                                                        '</div>' +
                                                        '<div class="form-group">' +
                                                        '<label for="">Cost:</label>' +
                                                        '<input type="text" class="form-control" id="">' +
                                                        '</div>' +
                                                        '</div>');
                                                    $('.nav-tabs li:nth-child(' + id + ') a').click();

                                                    $(document).ready(function() {
                                                        $('.js-example-basic-single-item'+id).select2();
                                                    });
                                                });
                                            </script>
                                            @append
                                        @section('css')
                                            <style>
                                                .nav-tabs > li {
                                                    position:relative;
                                                }
                                                .nav-tabs > li > a {
                                                    display:inline-block;
                                                }
                                                .nav-tabs > li > span {
                                                    display:none;
                                                    cursor:pointer;
                                                    position:absolute;
                                                    right: 6px;
                                                    top: 8px;
                                                    color: red;
                                                }
                                                .nav-tabs > li:hover > span {
                                                    display: inline-block;
                                                }
                                            </style>
                                        @append
                                        <div class="form-group">
                                            <label for="">Quantity:</label>
                                            <input type="text" class="form-control" id="">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Cost:</label>
                                            <input type="text" class="form-control" id="">
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