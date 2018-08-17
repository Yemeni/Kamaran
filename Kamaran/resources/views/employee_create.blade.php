@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Add Employee</h1>

@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="box-header with-border">
                            <h3 class="box-title">Employee Details:</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form role="form" action="{{ url('/employee') }}" method="post">
                            @csrf

                            <div class="box-body">
                                <div class="form-group">
                                    <label for="">Name:</label>
                                    <input type="text" name="name" class="form-control" id="">
                                </div>
                                <div class="form-group">
                                    <label for="">Username:</label>
                                    <input type="text" name="username" class="form-control" id="">
                                </div>
                                <div class="form-group">
                                    <div class="radio">
                                        <label>
                                            <input type="radio"
                                                   name="gender"
                                                   id="optionsRadios1"
                                                   value="male"
                                                   checked="">
                                            Male
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="gender" id="optionsRadios2" value="female">
                                            Female
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Phone:</label>
                                    <input type="text" name="phone" class="form-control" id="">
                                </div>
                                <div class="form-group">
                                    <label for="">Email:</label>
                                    <input type="email" name="email" class="form-control" id="">
                                </div>
                                @if(! auth()->user()->isManager())
                                    <div class="form-group">
                                        <label for="">Level:</label>
                                        <select class="form-control" name="level">
                                            <option selected disabled>-- Select a Level --</option>
                                            <option value="admin">Admin/Manager</option>
                                            <option value="manager">Head of Department</option>
                                            <option value="employee">Employee</option>
                                            <option value="inventory_employee">Inventory Employee</option>
                                            <option value="head_of_suppliers">Head of Suppliers</option>
                                        </select>
                                    </div>
                                    <div class="form-group" style="display: none;" id="category">
                                        <label for="">Category:</label>
                                        <select class="form-control" name="category_id">
                                            <option disabled selected>Select Category</option>
                                            @foreach($categories as $category)
                                                @foreach($employees as $employee)
                                                    @if($category->id != $employee->category->id && $employee->level != 'manager')
                                                        @break
                                                    @endif
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            @endforeach
                                        </select>
                                    </div>
                                @else
                                    <input type="hidden" name="level" value="employee">
                                    <input type="hidden" name="category_id" value="{{ auth()->user()->category_id }}">
                                @endif
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea class="form-control"
                                              rows="3"
                                              name="address"
                                              placeholder="Enter ..."></textarea>
                                </div>
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="status" value="active" checked>
                                            Active
                                        </label>
                                    </div>


                                </div>

                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="reset" class="btn btn-default ">Cancel</button>
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
        $(document).ready(function () {
            $('select[name="level"]').on('change', function (eve) {
                switch ($(this).val()) {
                    case 'manager':
                        $('#category').show();
                        break;
                    case 'employee':
                        $('#category').show();
                        break;
                    default:
                        $('#category').hide();
                        break;
                }
            })
        })
    </script>
@append
