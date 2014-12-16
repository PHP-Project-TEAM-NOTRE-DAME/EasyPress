@extends('_layouts.master')

@section('container')
    <!-- Post Content -->
    <article>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <h2 class="section-heading"> {{ $post->title }}</h2>
                <p> {{ $post->content }}</p>
                <p class="post-meta">Posted by <a href="#">{{ $post->user->username }}</a> on {{ date('d F, Y', strtotime($post->created_at)) }}</p>
            </div>
        </div>
    </article>

    <hr>
@stop