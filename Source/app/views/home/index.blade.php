@extends('_layouts.master')

@section('container')
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            @foreach ($posts as $post)
                <div class="post-preview">
                    <a href="{{ action('PostController@show', $post->id) }}">
                        <h2 class="post-title">
                            {{ $post->title }}
                        </h2>
                        <h3 class="post-subtitle">
                            {{ substr($post->content, 0, 150) }}...

                        </h3>
                    </a>
                        <p>Posted by 
                            {{ HTML::linkRoute('post.show_by_user', $post->user->username, array($post->user->id)); }}
                            on {{ date('d F, Y', strtotime($post->created_at)) }}
                        </p>
                </div>
                <hr>
            @endforeach

            <!-- Pager -->
            <ul class="pager">
                <li class="next">
                    {{ HTML::linkRoute('post.index', 'All Posts'); }}
                </li>
            </ul>
        </div>
    </div>
@stop