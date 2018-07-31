@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Your Manager</h1>

@stop

@section('content')

    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">

                    <h3 class="profile-username text-center">Fatima Ali Hamood</h3>

                    <p class="text-muted text-center">Raw Resource Department</p>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

            <!-- About Me Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">About Manager</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
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
        <div class="col-md-3"></div>
    </div>
    <!-- /.row -->



@stop
