<div class="post-preview">
    <a href="{{ URL::route('post.show', ['id' => $post->id]) }}">
        <h2 class="post-title">
            {{{ $post->title }}}
        </h2>
        <h3 class="post-subtitle">
            {{{ trim(substr(preg_replace('/<.+?>/', '', $post->content), 0, 150)) }}}...
        </h3>
    </a>
    <p>Posted by {{ HTML::linkRoute('user.show', $post->user->username, ['id' => $post->user->id]) }} on 
        {{{ date('d F, Y h:m:s', strtotime($post->created_at)) }}}</p>
    <hr>
</div>