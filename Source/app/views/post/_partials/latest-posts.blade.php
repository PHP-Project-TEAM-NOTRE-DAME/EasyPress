<div class="row">
    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
        <h2>Latest Posts</h2>
    </div>
    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
        @foreach ($posts as $post)
            @include('post._partials.preview', ['post' => $post])
        @endforeach
    </div>
</div>