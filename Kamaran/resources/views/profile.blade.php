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

                    <h3 class="profile-username text-center">{{ $user->name }}</h3>

                    <p class="text-muted text-center">
                        @if(! $user->withoutCategory())
                            {{ $user->category->name }}
                        @endif
                    </p>

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Username</b>
                            <a class="pull-right">{{ $user->username }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Created</b>
                            <a class="pull-right">{{ $user->created_at->diffForHumans() }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Status</b>
                            <a class="pull-right">{{ $user->status }}</a>
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
                    <strong>
                        <i class="fa fa-neuter margin-r-5"></i>
                        Gender</strong>

                    <p class="text-muted">
                        {{ $user->gender }}
                    </p>

                    <hr>

                    <strong>
                        <i class="fa fa-phone margin-r-5"></i>
                        Phone</strong>

                    <p class="text-muted">
                        {{ $user->phone }}
                    </p>

                    <hr>

                    <strong>
                        <i class="fa fa-envelope margin-r-5"></i>
                        Email</strong>

                    <p class="text-muted">
                        {{ $user->email }}
                    </p>

                    <hr>

                    <strong>
                        <i class="fa fa-map-marker margin-r-5"></i>
                        Address</strong>

                    <p class="text-muted">{{ $user->address }}</p>

                    <hr>


                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            @if ($errors->any())
                <div class="box box-danger">
                    <div class="bo-body">
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif
            @alert('BTA')
            <div class="box box-primary" id="settings">
                <div class="box-body">
                    <form class="form-horizontal" action="{{ url('/profile/edit') }}" method="post" autocomplete="off">
                        @csrf

                        {{--<div class="form-group">--}}
                        {{--<label for="inputName" class="col-sm-2 control-label">Password</label>--}}

                        {{--<div class="col-sm-10">--}}
                        {{--<input type="password" value="password" class="form-control" id="inputName" placeholder="">--}}
                        {{--</div>--}}
                        {{--</div>--}}


                        <div class="form-group">
                            <label for="inputExperience" class="col-sm-2 control-label">Phone</label>

                            <div class="col-sm-10">
                                <input type="text"
                                       name="phone"
                                       class="form-control"
                                       value="{{ $user->phone }}"
                                       id="inputSkills"
                                       placeholder="Address">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputSkills" class="col-sm-2 control-label">Address</label>

                            <div class="col-sm-10">
                                <textarea class="form-control"
                                          name="address"
                                          id="inputExperience"
                                          placeholder="Phone">{{ $user->address }}</textarea>
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
                    <form class="form-horizontal"
                          action="{{ url('/profile/changePassword') }}"
                          method="post" autocomplete="off">
                        @csrf

                        <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label">Old Password</label>

                            <div class="col-sm-10">
                                <input type="password"
                                       name="old_password"
                                       class="form-control"
                                       id="inputName"
                                       placeholder="">
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label">New Password</label>

                            <div class="col-sm-10">
                                <input type="password"
                                       name="password"
                                       class="form-control"
                                       id="inputName"
                                       placeholder="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label">Repeat Password</label>

                            <div class="col-sm-10">
                                <input type="password"
                                       name="password_confirmation"
                                       class="form-control"
                                       id="inputName"
                                       placeholder="">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-danger">Change</button>
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
