@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>


                <div class="card-body">
                    @can('isUser')
                    <div class="container">
                        <div class="row">
                           <div class="col-md-14" >
                              <a href="{{route('posts.create')}}" class="btn btn-primary" >Add Blog</a>
                           </div>
                        </div>
                     </div>
                    @endcan


                    <div class="x_content">
                        <table id="datatable-filter" class="table table-striped table-bordered table-responsive table_search_bar">
                           <thead>
                              <tr>
                                 <th width="50">Sr. No.</th>
                                 <th class="">Title</th>
                                 <th>Description</th>
                                 <th>Author</th>
                                 <th>Image</th>
                                 <th>Date</th>
                              <th class="no-sort sort">Action</th>
                              </tr>
                           </thead>
                           @foreach($posts as $post)
                           <tr>
                              <td>{{$post->id}}</td>
                              <td>{{$post->title}}</td>
                              <td>{{$post->description}}</td>
                              <td>{{$post->user->name}}</td>

                        <td><img src="{{ url('/storage') }}/{{ $post->image }}" width="100"> </td>
                              <td>{{$post->created_at}}</td>
                             <td><span>
                             <a href="{{route ('posts.edit',$post->id)}}" class="btn btn-success edit_btn">Edit</a>
                             <a href="{{route ('posts.show',$post->id)}}" class="btn btn-primary">View</a>

                             <form method="POST" action="{{route('posts.destroy',$post->id)}}">
                              {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                 <div class="form-group">
                              <input type="submit" class="btn btn-danger delete-user" value="Delete">
                              </div>
                         </form>
                         </span>
                             </td>
                           </tr>
                           @endforeach
                        </table>
                     </div>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
