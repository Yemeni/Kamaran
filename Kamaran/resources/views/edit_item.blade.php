@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Edit Item</h1>

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
                        <form role="form" action="{{ url('/item/'.$item->id) }}" method="post">
                            @csrf
                            @method('PUT')

                            <div class="box-body">
                                <div class="form-group">
                                    <label for="">Name:</label>
                                    <input type="text" name="name" value="{{ $item->name }}" class="form-control" id="">
                                </div>
                                <div class="form-group">
                                    <label for="">Category:</label>
                                    <select name="category_id" class="form-control">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ $item->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control"
                                              name="description"
                                              rows="3"
                                              placeholder="Enter ...">{{ $item->description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Specification</label>
                                    <textarea class="form-control"
                                              name="specification"
                                              rows="3"
                                              placeholder="Enter ...">{{ $item->specification }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Unit:</label>
                                    <select name="unit" class="form-control">
                                        <option {{ $item->unit == 'KG' ? 'selected' : '' }}>KG</option>
                                        <option {{ $item->unit == 'Gram' ? 'selected' : '' }}>Gram</option>
                                        <option {{ $item->unit == 'Tonne' ? 'selected' : '' }}>Tonne</option>
                                        <option {{ $item->unit == 'Liter' ? 'selected' : '' }}>Liter</option>
                                        <option {{ $item->unit == 'Milliliter' ? 'selected' : '' }}>Milliliter
                                        </option>
                                        <option {{ $item->unit == 'Barre' ? 'selected' : '' }}>Barre</option>
                                        <option {{ $item->unit == 'Gallon' ? 'selected' : '' }}>Gallon</option>
                                        <option {{ $item->unit == 'Bottle' ? 'selected' : '' }}>Bottle</option>
                                        <option {{ $item->unit == 'Meter' ? 'selected' : '' }}>Meter</option>
                                        <option {{ $item->unit == 'Centimeter' ? 'selected' : '' }}>Centimeter
                                        </option>
                                        <option {{ $item->unit == 'Kilometer' ? 'selected' : '' }}>Kilometer
                                        </option>
                                        <option {{ $item->unit == 'Cartons' ? 'selected' : '' }}>Cartons</option>
                                        <option {{ $item->unit == 'Pack' ? 'selected' : '' }}>Pack</option>
                                        <option {{ $item->unit == 'Packet' ? 'selected' : '' }}>Packet</option>
                                        <option {{ $item->unit == 'Box' ? 'selected' : '' }}>Box</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Danger Level:</label>
                                    <select name="danger_level" class="form-control">
                                        <option {{ $item->danger_level == 'low' ? 'selected' : '' }}>low</option>
                                        <option {{ $item->danger_level == 'flammable' ? 'selected' : '' }}>flammable
                                        </option>
                                        <option {{ $item->danger_level == 'toxic' ? 'selected' : '' }}>toxic</option>
                                    </select>
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
