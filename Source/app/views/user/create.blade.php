@extends('_layouts.master')

@section('container')
    {{ Form::open(array('route' => 'user.store', 'method' => 'post')) }}
    	<div class="form-group col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
    		{{ Form::label('username', 'Username') }}
			{{ Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Name']) }}
        	{{ $errors->first('username', '<p class="error text-danger">:message</p>') }}
		</div>
    	<div class="form-group col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
    		{{ Form::label('email', 'Email') }}
			{{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) }}
        	{{ $errors->first('email', '<p class="error text-danger">:message</p>') }}
    	</div>
		<div class="form-group col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
			{{ Form::label('password', 'Password') }}
			{{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) }}
			{{ Form::label('password_confirmation', 'Confirm Password') }}
			{{ Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirm password']) }}
        	{{ $errors->first('password', '<p class="error text-danger">:message</p>') }}
		</div>
		<div class="form-group col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
        	{{ Form::submit('Register', ['class' => 'btn btn-default pull-right']) }}
		</div>
    {{ Form::close() }}
@stop