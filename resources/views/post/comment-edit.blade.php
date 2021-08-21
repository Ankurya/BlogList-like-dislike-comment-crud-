@extends('layouts.app')
@section('content')
    <style type="text/css">
        h2.record {
            font-size: 30px;
            position: relative;
            top: 7px;
        }

    </style>
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

                            <h4>Display Comments</h4>
                            <hr />
                            <h4>Add comment</h4>
                            <form method="post" action="{{ route('comments.update', $comment->id) }}">
                                @method('PUT')

                                @csrf
                                <div class="form-group">
                                    <textarea class="form-control" name="body">{{ $comment->body }}</textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-success" value="Add Comment" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
