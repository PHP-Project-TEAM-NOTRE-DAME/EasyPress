@extends('_layouts.master')

@section('container')
	    {{ Form::open(array('route' => 'post.home.login', 'method' => 'post')) }}
    	<div class="form-group">
    		{{ Form::label('email', 'Email') }}
			{{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) }}
        	{{ $errors->first('email', '<p class="error text-danger">:message</p>') }}
    	</div>
		<div class="form-group">
			{{ Form::label('password', 'Password') }}
			{{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) }}
        	{{ $errors->first('password', '<p class="error text-danger">:message</p>') }}
		</div>
		<div class="form-group">
			{{ Form::label('remember', 'Remember') }}
			{{ Form::checkbox('remember') }}
		</div>
		<div class="form-group">
        	{{ Form::submit('login', ['class' => 'btn btn-default pull-right']) }}
		</div>
    {{ Form::close() }}
@stop