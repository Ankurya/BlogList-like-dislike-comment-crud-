<meta name="csrf-token" content="{{ csrf_token() }}" />

@foreach ($comments as $comment)
    <div class="display-comment" data-id="{{ $comment->id }}" @if ($comment->parent_id != null) style="margin-left:40px;" @endif>
        <strong>{{ $comment->user->name }}</strong>
        <p>{{ $comment->body }}</p>
        <a href="" id="reply"></a>
        <form method="post" action="{{ route('comments.store') }}">
            @csrf
            <div class="form-group">
                <input type="text" name="body" class="form-control" />
                <input type="hidden" name="post_id" value="{{ $post_id }}" />
                <input type="hidden" name="parent_id" value="{{ $comment->id }}" />
            </div>
            @if (Auth::user()->id === $comment->user->id)
                <a href="{{ route('comments.edit', $comment->id) }}">Edit</a>
                <a href="{{ route('comments.destroy', ['comment' => $comment->id]) }}">Delete</a>
            @endif

            <div class="form-group">
                <input type="submit" class="btn btn-warning" value="Reply" />
            </div>
        </form>
        @include('post.commentsDisplay', ['comments' => $comment->replies])
    </div>
@endforeach

