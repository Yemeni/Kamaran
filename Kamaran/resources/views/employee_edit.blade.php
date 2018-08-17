@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Edit Employee</h1>

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
                        <form role="form" action="{{ url('/employee/'.$user->id.'/edit') }}" method="post">
                            @csrf

                            <div class="box-body">
                                <div class="form-group">
                                    <label for="">Name:</label>
                                    <input type="text" value="{{ $user->name }}" name="name" class="form-control" id="">
                                </div>
                                <div class="form-group">
                                    <label for="">Username:</label>
                                    <input type="text"
                                           name="username"
                                           value="{{ $user->username }}"
                                           class="form-control"
                                           id="">
                                </div>
                                <div class="form-group">
                                    <div class="radio">
                                        <label>
                                            <input type="radio"
                                                   name="gender"
                                                   id="optionsRadios1"
                                                   value="male"
                                                    {{ $user->gender == 'male' ? 'checked' : '' }}>
                                            Male
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input {{ $user->gender == 'female' ? 'checked' : '' }}
                                                   type="radio"
                                                   name="gender"
                                                   id="optionsRadios2"
                                                   value="female">
                                            Female
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Phone:</label>
                                    <input type="text"
                                           name="phone"
                                           value="{{ $user->phone }}"
                                           class="form-control"
                                           id="">
                                </div>
                                <div class="form-group">
                                    <label for="">Email:</label>
                                    <input type="email"
                                           name="email"
                                           value="{{ $user->email }}"
                                           class="form-control"
                                           id="">
                                </div>
                                @if(! auth()->user()->isManager())
                                    <div class="form-group">
                                        <label for="">Level:</label>
                                        <select class="form-control" name="level">
                                            <option selected disabled>-- Select a Level --</option>
                                            <option value="admin" {{ $user->level == 'admin' ? 'selected' : '' }}>Admin
                                            </option>
                                            <option value="manager" {{ $user->level == 'manager' ? 'selected' : '' }}>
                                                Manager
                                            </option>
                                            <option value="employee" {{ $user->level == 'employee' ? 'selected' : '' }}>
                                                Employee
                                            </option>
                                            <option value="inventory_employee" {{ $user->level == 'inventory_employee' ? 'selected' : '' }}>
                                                Inventory Employee
                                            </option>
                                            <option value="head_of_suppliers" {{ $user->level == 'head_of_suppliers' ? 'selected' : '' }}>
                                                Head of Suppliers
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group" style="display: none;" id="category">
                                        <label for="">Category:</label>
                                        <select class="form-control" name="category_id">
                                            <option selected disabled>-- Select a Category --</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" {{ $user->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
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
                                              placeholder="Enter ...">{{ $user->address }}</textarea>
                                </div>
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"
                                                   name="status"
                                                   value="active" {{ $user->status == 'active' ? 'checked' : '' }}>
                                            Active
                                        </label>
                                    </div>


                                </div>

                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary pull-right">Update</button>
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