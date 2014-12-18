@extends('_layouts.master')

@section('container')
    <!-- Post Content -->
    <article>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <h2 class="section-heading"> {{{ $post->title }}}</h2>
                <p> {{ $post->content }}</p>
                @if(Auth::check() && Auth::user()->posts()->find($post->id))
                {{HTML::linkRoute('post.edit', 'Edit', ['id' => $post->id], ['class' => 'btn btn-success'])}}
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-2 col-md-8 col-md-offset-1">
                <p class="post-meta">Posted by
                    {{ HTML::linkRoute('user.post.index', $post->user->username, array($post->user->id)); }}
                    on {{{ date('d F, Y', strtotime($post->created_at)) }}}</p>
            </div>
        </div>
        
        {{ Form::open(array('route' => ['comment.store', $post->id ], 'method' => 'post')) }}
            @if (!Auth::check())
                <div class="form-group col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    {{ Form::label('name', 'Enter your name') }}
                    {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) }}
                    {{ $errors->first('name', '<p class="error text-danger">:message</p>') }}
                </div>
                <div class="form-group col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    {{ Form::label('email', 'Enter your email /optional/') }}
                    {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) }}
                    {{ $errors->first('email', '<p class="error text-danger">:message</p>') }}
                </div>
            @endif
        	<div class="form-group col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                {{ Form::label('content', 'Comment') }}
                {{ Form::textarea('content', null, ['class' => 'form-control', 'placeholder' => 'Write your comment here']) }}
                {{ $errors->first('content', '<p class="error text-danger">:message</p>') }}
        	</div>
            <div class="row">
                <div class="form-group col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    {{ Form::submit('Submit Comment', ['class' => 'btn btn-default pull-right']) }}
                </div>
            </div>
        {{ Form::close() }}
        <br>
    
    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
        
        @foreach ($post->comments as $comment)
            <div class="media">
                <a class="media-left" href="#">
                {{ HTML::image('img/avatar.png'); }}
                </a>
              <div class="media-body">
                <p>{{{ $comment->content }}}</p>
                <p class="text-muted small-text">Commented by {{{ $comment->user->username or $comment->name }}} on {{{ date('d F, Y', strtotime($comment->created_at)) }}}</p>
              </div>
            </div>  
            <hr>
        @endforeach   
    </div>
    
    </article>

    <hr>
@stop