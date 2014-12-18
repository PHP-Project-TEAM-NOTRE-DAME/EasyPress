@extends('_layouts.master')

@section('container')
    <div class="row">
        {{ Form::open(array('route' => 'post.index', 'method' => 'get')) }}
            
    	<div class="form-group col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            Order:<br>
            {{ Form::label('asc', 'Ascending') }}
            {{ Form::radio('dir', 'asc', false, ['id' => 'asc']) }}
            {{ Form::label('desc', 'Descending') }}
            {{ Form::radio('dir', 'desc', false, ['id' => 'desc']) }}
        </div>
        <div class="form-group col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            Sort by:<br>
            {{ Form::select('order', ['title' => 'Title', 'date' => 'Date', 'views' => 'Views'], null, ['class' => 'form-control']) }}
        </div>
    	
        <div class="form-group col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            {{ Form::submit('Search', ['class' => 'btn btn-default']) }}
        </div>
    {{ Form::close() }}
    </div>
@stop