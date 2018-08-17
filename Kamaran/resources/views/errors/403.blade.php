@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Error</h1>

@stop

@section('content')
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <h2>Unauthorized access <small>You are not Authorized to access this page!</small></h2>
            <p>Please contact the administration for more information ...</p>
            <a href="/profile">Go Back >></a>
        </div>
        <div class="col-md-2"></div>
    </div>

@stop