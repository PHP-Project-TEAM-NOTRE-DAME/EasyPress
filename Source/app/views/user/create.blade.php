@extends('_layouts.master')

@section('container')
    {{ Form::open(array('route' => 'user.store', 'method' => 'post')) }}
    	<div class="form-group">
    		{{ Form::label('name', 'Name') }}
			{{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) }}
		</div>
    	<div class="form-group">
    		{{ Form::label('email', 'Email') }}
			{{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) }}
    	</div>
		<div class="form-group">
			{{ Form::label('password', 'Password') }}
			{{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) }}
			{{ Form::label('confirm-password', 'Confirm Password') }}
			{{ Form::password('confirm-password', ['class' => 'form-control', 'placeholder' => 'Confirm password']) }}
		</div>
		<div class="form-group">
        	{{ Form::submit('Register', ['class' => 'btn btn-default pull-right']) }}
		</div>
    {{ Form::close() }}
@stop