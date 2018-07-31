@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Manage Categories</h1>

@stop

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Categories</h3>

                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody><tr>
                            <th>Category ID</th>
                            <th>Category Name</th>
                            <th>Description</th>
                            <th>Manager</th>
                        </tr>
                        <tr>
                            <td><a href="">154</a></td>
                            <td>Dept. of Xyz</td>
                            <td>Some text here</td>
                            <td>Saleh Vladmier</td>
                        </tr>
                        <tr>
                            <td><a href="">154</a></td>
                            <td>Dept. of Xyz</td>
                            <td>Some text here</td>
                            <td>Saleh Vladmier</td>
                        </tr>
                        <tr>
                            <td><a href="">154</a></td>
                            <td>Dept. of Xyz</td>
                            <td>Some text here</td>
                            <td>Saleh Vladmier</td>
                        </tr>
                        <tr>
                            <td><a href="">154</a></td>
                            <td>Dept. of Xyz</td>
                            <td>Some text here</td>
                            <td>Saleh Vladmier</td>
                        </tr>
                        </tbody></table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>

@stop