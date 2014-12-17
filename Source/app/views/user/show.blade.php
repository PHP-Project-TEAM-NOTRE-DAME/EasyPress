@extends('_layouts.master')

@section('container')
	@include('post._partials.latest-posts', ['posts' => $user->posts])

	<div class="row">
    	<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
		    <ul class="pager">
		        <li class="next">
		            {{ HTML::linkRoute('user.post.index', 'All Posts', ['id' => $user->id]) }}
		        </li>
		    </ul>
		</div>
	</div>
@stop