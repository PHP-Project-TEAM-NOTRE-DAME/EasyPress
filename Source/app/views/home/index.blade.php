@extends('_layouts.master')

@section('container')
    @if (Auth::check())
        Logged!
    @endif

    @include('post._partials.latest-posts', ['posts' => $posts])

	<div class="row">
	    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
	        <h2>Latest Posts</h2>
	    </div>
    	<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
		    <ul class="pager">
		        <li class="next">
		            {{ HTML::linkRoute('post.index', 'All Posts') }}
		        </li>
		    </ul>
		</div>
	</div>

@stop