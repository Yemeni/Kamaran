@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Manage Employees</h1>

@stop

@section('content')

    <div class="row">
        <div class="col-lg-2 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-purple">
                <div class="inner">
                    <h3>8</h3>

                    <p>Total Employees</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-xs-6">
            <!-- small box -->
            <div class="box">
                <div class="inner">
                    <p>Today is Tuesday,</p>
                    <p>22 March 2019</p>
                    <p>8:31 AM</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Employees</h3>

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
                            <th>Employee ID</th>
                            <th>Employee Name</th>
                            <th>Username</th>
                            <th>Gender</th>
                            <th>Date Created</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Level</th>
                            <th>Address</th>
                            <th>Status</th>
                        </tr>
                        <tr>
                            <td><a href="">154</a></td>
                            <td>Vladamir Saleh</td>
                            <td>vladmirs</td>
                            <td>Male</td>
                            <td>11-7-2018</td>
                            <td>+967 777 777 777</td>
                            <td>Vladmir.Saleh@kamaran.ye</td>
                            <td>Employee</td>
                            <td>Haddah St., XYZ Road, Sana'a</td>
                            <td>Active</td>
                        </tr>
                        <tr>
                            <td><a href="">154</a></td>
                            <td>Vladamir Saleh</td>
                            <td>vladmirs</td>
                            <td>Male</td>
                            <td>11-7-2018</td>
                            <td>+967 777 777 777</td>
                            <td>Vladmir.Saleh@kamaran.ye</td>
                            <td>Employee</td>
                            <td>Haddah St., XYZ Road, Sana'a</td>
                            <td>Active</td>
                        </tr>
                        <tr>
                            <td><a href="">154</a></td>
                            <td>Vladamir Saleh</td>
                            <td>vladmirs</td>
                            <td>Male</td>
                            <td>11-7-2018</td>
                            <td>+967 777 777 777</td>
                            <td>Vladmir.Saleh@kamaran.ye</td>
                            <td>Employee</td>
                            <td>Haddah St., XYZ Road, Sana'a</td>
                            <td>Active</td>
                        </tr>
                        <tr>
                            <td><a href="">154</a></td>
                            <td>Vladamir Saleh</td>
                            <td>vladmirs</td>
                            <td>Male</td>
                            <td>11-7-2018</td>
                            <td>+967 777 777 777</td>
                            <td>Vladmir.Saleh@kamaran.ye</td>
                            <td>Employee</td>
                            <td>Haddah St., XYZ Road, Sana'a</td>
                            <td>Active</td>
                        </tr>
                        </tbody></table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>

@stop