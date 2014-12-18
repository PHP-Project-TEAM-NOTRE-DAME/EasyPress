@extends('_layouts.master')

@section('container')
	    {{ Form::open(array('route' => 'post.home.login', 'method' => 'post')) }}
    	<div class="form-group col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            {{ Form::label('email', 'Email') }}
            {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) }}
            {{ $errors->first('email', '<p class="error text-danger">:message</p>') }}
    	</div>
        <div class="form-group col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            {{ Form::label('password', 'Password') }}
            {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) }}
            {{ $errors->first('password', '<p class="error text-danger">:message</p>') }}
        </div>
        <div class="form-group col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            {{ Form::label('remember', 'Remember') }}
            {{ Form::checkbox('remember') }}
        </div>
            {{ $errors->first('summary', '<p class="error text-danger">:message</p>') }}
        <div class="form-group col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            {{ Form::submit('login', ['class' => 'btn btn-default pull-right']) }}
        </div>
    {{ Form::close() }}
@stop