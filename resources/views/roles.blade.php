@extends('layouts.app')

@section('content')


    <div class="right_col" role="main">
        <div>
            <div class="page-title">
                <div class="title_left">
                    <h3>Users</h3>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-14">
                            <a href="{{ route('posts.create') }}" class="btn btn-primary">Add Blog</a>
                        </div>
                    </div>
                </div>
                <div class="x_content">
                    <table id="datatable-filter"
                        class="table table-striped table-bordered table-responsive table_search_bar">
                        <thead>
                            <tr>
                                <th width="50">Role</th>
                                <th class="">Name</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        @foreach ($users as $user)

                            <tr>
                                <td>{{ $user->role->role_name }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>

                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $('.delete-user').click(function(e) {
            e.preventDefault()
            if (confirm('Are you sure?')) {
                $(e.target).closest('form').submit()
            }
        });
    </script>
@endsection
