@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Add Item</h1>

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
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                    @endif
                    <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{ url('/item') }}" method="post" autocomplete="off">
                            @csrf

                            <div class="box-body">
                                <div class="form-group">
                                    <label for="">Name:</label>
                                    <input type="text" name="name" class="form-control" id="">
                                </div>
                                <div class="form-group">
                                    <label for="">Category:</label>
                                    <select name="category_id" class="form-control">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" name="description" rows="3" placeholder="Enter ..."></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Specification</label>
                                    <textarea class="form-control" name="specification" rows="3" placeholder="Enter ..."></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Unit:</label>
                                    <select name="unit" class="form-control">
                                        <option selected disabled>Select a Unit</option>
                                        <option>KG</option>
                                        <option>Gram</option>
                                        <option>Tonne</option>
                                        <option>Liter</option>
                                        <option>Milliliter</option>
                                        <option>Barrel</option>
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
                                    <select name="danger_level" class="form-control">
                                        <option selected disabled>Select a Danger level</option>
                                        <option value="low">C- Low Priority</option>
                                        <option value="normal">B- Normal Priority</option>
                                        <option value="high">A- High Priority</option>
                                    </select>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input id="importantCheckBox" type="checkbox" name="important" value="0">
                                        Important
                                    </label>
                                </div>
                                <div></div>


                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <a href="{{ url('/item') }}" class="btn btn-default ">Cancel</a>
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
            $('#importantCheckBox').change(function(){
                cb = $(this);
                if(cb.prop('checked')){
                    cb.val(1);
                }else{
                    cb.val(0);
                }

            });
        })
    </script>
@append