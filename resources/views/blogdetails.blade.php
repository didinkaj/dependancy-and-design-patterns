@extends('layouts.main')
@section('content')
    <div class="card mb-4">
        <div class="card-header">{{ $allBlogs->title}} <span class="float-md-right">

                <form method="POST" action="/deleteBlog/{{$allBlogs->id}}" >
                    @csrf
                    {!! method_field('delete') !!}
                    <button type="submit" class="btn btn-default btn-xs waves-effect waves-classic" style="color: red;">
                        <i class="icon md-delete" aria-hidden="true"></i>Delete
                    </button>
                </form>
                </span>
        </div>

        <div class="card-body">
            {{ $allBlogs->body}}
            <br/>
            <a href="{{url('editblog/'.$allBlogs->id)}}" class="btn btn-primary  float-right mt-4">Edit</a>
        </div>


    </div>


@endsection
