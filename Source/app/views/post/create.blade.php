@extends('_layouts.master')

@section('container')
    {{ Form::open(array('route' => 'post.store', 'method' => 'post')) }}
    	<div class="form-group col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            {{ Form::label('title', 'Title') }}
            {{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title']) }}
            {{ $errors->first('title', '<p class="error text-danger">:message</p>') }}
        </div>
    	<div class="form-group col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            {{ Form::label('content', 'Text') }}
            {{ Form::textarea('content', null, ['class' => 'form-control', 'placeholder' => 'Write your post here']) }}
            {{ $errors->first('content', '<p class="error text-danger">:message</p>') }}
    	</div>
        <div class="form-group col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            {{ Form::label('tags', 'Tags') }}
            {{ Form::select('tags[]', [], null, ['data-role' => 'tagsinput', 'multiple' => 'multiple']) }}
            {{ $errors->first('tags', '<p class="error text-danger">:message</p>') }}
    	</div>
        <div class="form-group col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            {{ Form::submit('Submit New Post', ['class' => 'btn btn-default pull-right']) }}
        </div>
    {{ Form::close() }}
    
@stop
