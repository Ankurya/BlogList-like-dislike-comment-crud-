@extends('layouts.app')
@section('content')

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <div class="right_col" role="main">
        <div>
            <div class="page-title">
                <div class="title_left">
                    <h3>Post Details</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_content">

                            <table class="table table-striped table-bordered custom-table spam">
                                <tr>
                                    <td width="210">Profile Picture</td>
                                    <td><img src="{{ url('/storage') }}/{{ $post->image }}" width="100"> </td>
                                </tr>
                                <tr>
                                    <td>Title</td>
                                    <td>{{ $post->title }}</td>
                                </tr>
                                <tr>
                                    <td>Description</td>
                                    <td>{{ $post->description }}</td>
                                </tr>

                                <tr>
                                    <td>Date</td>
                                    <td>{{ $post->created_at }}</td>
                                </tr>
                            </table>
                            {{-- @dd($post->likes->user_id) --}}
                            {{-- @if (empty($post->likes->user_id))
                            <button type="button" class="btn btn-primary" data-post-id="{{ $post->id }}"
                                data-user-id="{{ Auth::user()->id }}"
                                id="like-status">
                                <span class="#">Likes</span> <span class="#">{{$count}}</span>
                            </button>
                            @else
                            @if ($post->likes && $post->likes->first()->status == '1')
                            <button type="button" class="btn btn-danger " data-post-id="{{ $post->id }}"
                                data-user-id="{{ auth()->id() }}"
                                id="dislike-status">
                                <span class="#">Dislikes</span> <span class="#">{{   $count }}</span>
                            </button>
                            @else
                            <button type="button" class="btn btn-primary" data-post-id="{{ $post->id }}"
                                data-user-id="{{ Auth::user()->id }}"
                                id="like-status">
                                <span class="#">Likes</span> <span class="#">{{ $count }}</span>
                            </button>
                            @endif
                            @endif --}}
                            <button type="button" class="btn btn-primary" data-post-id="{{ $post->id }}" data-type="{{ ($user_like_count > 0) ? 'Dislike' : 'Like' }}"
                                data-user-id="{{ Auth::user()->id }}" id="like-status">
                                <span class="label">{{ ($user_like_count > 0) ? 'Dislike' : 'Like' }}</span> <span class="#">{{ $count }}</span>
                            </button>

                            {{-- @if ($post->status == true) --}}
                            <h4>Display Comments</h4>

                            @include('post.commentsDisplay', ['comments' => $post->comments, 'post_id' => $post->id])

                            <hr />
                            <h4>Add comment</h4>
                            <form method="post" action="{{ route('comments.store') }}">
                                @csrf
                                <div class="form-group">
                                    <textarea class="form-control" name="body"></textarea>
                                    <input type="hidden" name="post_id" value="{{ $post->id }}" />
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-success" value="Add Comment" />
                                </div>
                            </form>

                            {{-- @endif --}}


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#like-status").click(function(event) {

                event.preventDefault();
                // console.log($(this));
                let post_id = $(this).data("post-id");
                let user_id = $(this).data("user-id");

                $.ajax({
                    type: 'post',
                    url: "{{ url('like') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'user_id': user_id,
                        'post_id': post_id,

                    },
                    success: function(data) {
                        $('body').load(window.location.href)
                    },
                });
            });
        });
    </script>



@endsection
