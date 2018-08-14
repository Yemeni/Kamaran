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
                    <h3>{{ count($employees) }}</h3>

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
            @alert
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Employees</h3>

                    {{--<div class="box-tools">--}}
                    {{--<div class="input-group input-group-sm" style="width: 150px;">--}}
                    {{--<input type="text" name="table_search" class="form-control pull-right" placeholder="Search">--}}

                    {{--<div class="input-group-btn">--}}
                    {{--<button type="submit" class="btn btn-default">--}}
                    {{--<i class="fa fa-search"></i>--}}
                    {{--</button>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table class="table table-hover datatables">
                        <thead>
                        <tr>
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
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($employees as $employee)
                            <tr>
                                <td>
                                    <a href="{{ url('/employee/'.$employee->id.'/edit') }}">{{ $employee->id }}</a>
                                </td>
                                <td>{{ $employee->name }}</td>
                                <td>{{ $employee->username }}</td>
                                <td>{{ $employee->gender }}</td>
                                <td>{{ $employee->created_at->format('d-m-y') }}</td>
                                <td>{{ $employee->phone }}</td>
                                <td>{{ $employee->email }}</td>
                                <td>
                                    {{ ucwords($employee->level) }}
                                    @if(! is_null($employee->category))
                                        @ <strong>{{ $employee->category->name }}</strong>
                                    @endif
                                </td>
                                <td>{{ $employee->address }}</td>
                                <td>{{ $employee->status }}</td>
                                <td>
                                    <a href="{{ url('employee/'.$employee->id.'/edit') }}" class="btn btn-warning">
                                        Edit
                                    </a>
                                    <button class="btn btn-{{ $employee->status == 'active' ? 'danger' : 'success' }}"
                                            onclick="if(confirm('Do you really want to delete {{ $employee->name }}?')){$('#deleteForm{{ $employee->id }}').submit();return false;}">
                                        {{ $employee->status == 'active' ? 'Deactivate' : 'Activate' }}
                                    </button>
                                    <form action="{{ url('/employee/'.$employee->id) }}"
                                          method="post"
                                          id="deleteForm{{ $employee->id }}"
                                          style="display: none;">
                                        @csrf
                                        @method("DELETE")
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>

@stop