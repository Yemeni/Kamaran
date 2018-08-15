@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Inventory</h1>

@stop

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">On Hold Transactions</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table class="table table-hover datatables">
                        <thead>
                        <tr>
                            <th>Transaction ID</th>
                            <th>Employee</th>
                            <th>Date</th>
                            <th>Quantity</th>
                            <th>Comment</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>514</td>
                            <td>Ahmed Ali</td>
                            <td>2088-2-11</td>
                            <td>500000</td>
                            <td>Comment here</td>
                            <td>
                                <button type="button" class="btn btn-info btn-sm">Approve
                                </button>
                            </td>
                        </tr>
                        </tbody></table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div style="padding:10px;">
                    Filter by:
                    <form class="form-inline" action="/action_page.php">
                        <div class="form-group">
                            <label for="">Category:</label>
                            <select class="form-control">
                                <option>Department of Katha</option>
                                <option>Department of Bla</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Item:</label>
                            <select name="item_id" class="js-example-basic-single-item form-control">
                                <option>Blue Grape Bla</option>
                                <option>Red Tobacco Bla</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Status:</label>
                            <select class="form-control">
                                <option>All Transactions</option>
                                <option>Voucher</option>
                                <option>Consume</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Transactions</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table class="table table-hover datatables">
                        <thead>
                        <tr>
                            <th>Transaction ID</th>
                            <th>Transaction Type</th>
                            <th>Category</th>
                            <th>Item</th>
                            <th>Employee</th>
                            <th>Date</th>
                            <th>Quantity</th>
                            <th>Comment</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>514</td>
                            <td>Consume</td>
                            <td>Department of Bla</td>
                            <td>Blue Tobacco xyz</td>
                            <td>Ahmed Ali</td>
                            <td>2088-2-11</td>
                            <td>500000</td>
                            <td>Comment here</td>
                            <td>
                                <a href="" class="btn btn-warning">Edit</a>
                                <button onclick="" class="btn btn-danger">Delete</button>
                                <form id="delete1" action="" method="post">
                                    <input type="hidden" name="_token" value="">
                                    <input type="hidden" name="_method" value="DELETE">
                                </form>
                            </td>
                        </tr>
                        </tbody></table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>

@stop



@section('js')

    <script>
        $(document).ready(function () {
                    $('.js-example-basic-single-item').select2();
        })
    </script>

@append