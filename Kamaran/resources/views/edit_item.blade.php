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

                                <!-- Custom Tabs -->
                                <div class="nav-tabs-custom">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Supplier 1</a></li>
                                        <li class="pull-right add-tab"><a href="#" class="text-muted"><i class="fa fa-plus"></i> Add Supplier</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab_1">
                                            <div class="form-group">
                                                <label for="">Supplier Name:</label>
                                                <select class="js-example-basic-single form-control">
                                                    <option value="">Something .co</option>
                                                    <option value="">Company XYZ .limted</option>
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

@section('adminlte_js')
    <script>
        // select2 auto complete
        $(document).ready(function() {
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
            $(this).closest('li').before('<li><a href="#tab_' + id + '">Supplier ' + id +'</a> <span> x </span></li>');
            $('.tab-content').append('<div class="tab-pane" id="' + tabId + '">' +
                '<div class="form-group">' +
                '<label for="">Supplier Name:</label>' +
                '<select class="js-example-basic-single'+id +' form-control">' +
                '<option value="">Something .co</option>' + // repopulate from database
                '<option value="">Something2 .co</option>' +
                '</select>' +
                '</div>' +
                '</div>');
            $('.nav-tabs li:nth-child(' + id + ') a').click();

            $(document).ready(function() {
                $('.js-example-basic-single'+id).select2();
            });
        });
    </script>
@endsection

