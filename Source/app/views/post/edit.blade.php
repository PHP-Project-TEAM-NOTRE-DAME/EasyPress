@extends('_layouts.master')

@section('container')
    {{ Form::model($post, ['route' => ['post.update', $post->id], 'method' => 'put']) }}
    	<div class="form-group">
            {{ Form::label('title', 'Title') }}
            {{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title']) }}
            {{ $errors->first('title', '<p class="error text-danger">:message</p>') }}
        </div>
    	<div class="form-group">
            {{ Form::label('content', 'Text') }}
            {{ Form::textarea('content', null, ['class' => 'form-control', 'placeholder' => 'Write your post here']) }}
            {{ $errors->first('content', '<p class="error text-danger">:message</p>') }}
    	</div>
        <div class="form-group" id='tags-container'>
            {{ Form::label('tags', 'Tags') }}
            {{-- Form::select('tags[]', [], null, ['data-role' => 'tagsinput', 'multiple' => 'multiple']) --}}
            <select name="tags[]" data-role="tagsinput" multiple>
                @if(Input::old('tags'))
                    @foreach (Input::old('tags') as $tag)
                        <option value="{{$tag}}">{{$tag}}</option>
                    @endforeach
                @else
                    @foreach ($post->tags as $tag)
                        <option value="{{$tag->name}}">{{$tag->name}}</option>
                    @endforeach
                @endif
            </select>
            {{ $errors->first('tags', '<p class="error text-danger">:message</p>') }}
            {{ $errors->first('name', '<p class="error text-danger">:message</p>') }}
    	</div>
        <div class="form-group">
            {{ Form::submit('Submit New Post', ['class' => 'btn btn-default pull-right']) }}
        </div>
    {{ Form::close() }}
@stop

@section('scripts')
    {{ HTML::script('lib/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}
@stop
