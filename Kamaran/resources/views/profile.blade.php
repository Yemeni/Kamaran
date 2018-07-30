@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Your Profile</h1>

@stop

@section('content')

        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">

                        <h3 class="profile-username text-center">Nina Mcintire</h3>

                        <p class="text-muted text-center">Raw Resource Department</p>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Username</b> <a class="pull-right">nina_m</a>
                            </li>
                            <li class="list-group-item">
                                <b>Created</b> <a class="pull-right">2015-4-22</a>
                            </li>
                            <li class="list-group-item">
                                <b>Status</b> <a class="pull-right">Active</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- About Me Box -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">About Me</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <strong><i class="fa fa-neuter margin-r-5"></i> Gender</strong>

                        <p class="text-muted">
                            Male
                        </p>

                        <hr>

                        <strong><i class="fa fa-phone margin-r-5"></i> Phone</strong>

                        <p class="text-muted">
                            +967 777 777 777
                        </p>

                        <hr>

                        <strong><i class="fa fa-envelope margin-r-5"></i> Email</strong>

                        <p class="text-muted">
                            nina@kamaran.ye
                        </p>

                        <hr>

                        <strong><i class="fa fa-map-marker margin-r-5"></i> Address</strong>

                        <p class="text-muted">Malibu, California</p>

                        <hr>


                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="box box-primary" id="settings">
                    <div class="box-body">
                        <form class="form-horizontal">

                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Password</label>

                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="inputName" placeholder="">
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="inputExperience" class="col-sm-2 control-label">Phone</label>

                                <div class="col-sm-10">
                                    <textarea class="form-control" id="inputExperience" placeholder="Phone"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSkills" class="col-sm-2 control-label">Address</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputSkills" placeholder="Address">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-danger">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- /.nav-tabs-custom -->
            </div>
            <div class="col-md-9">
                <div class="box box-primary" id="settings">
                    <div class="box-body">
                        <form class="form-horizontal">

                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Old Password</label>

                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="inputName" placeholder="">
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">New Password</label>

                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="inputName" placeholder="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Repeat Password</label>

                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="inputName" placeholder="">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-danger">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->



@stop
