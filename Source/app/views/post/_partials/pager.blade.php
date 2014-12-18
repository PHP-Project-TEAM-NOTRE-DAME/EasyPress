<div class="text-center">
	@if (isset($parameters))
	    {{ $posts->appends($parameters)->links() }}
    @else
	    {{ $posts->links() }}
    @endif
</div>