@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Error</h1>

@stop

@section('content')
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <h2>Not Found <small>This page is not found!</small></h2>
            <p>Please contact the administration for more information ...</p>
            <a href="{{ url()->previous() }}">Go Back >></a>
        </div>
        <div class="col-md-2"></div>
    </div>

@stop