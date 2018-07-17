@extends('layouts.main')
@section('content')
    <p>Deleted Blogs</p>
    @foreach($allBlogs as $blog)
        <div class="card mb-4">
            @if($blog->deleted_at != null)

                <div class="card-header">{{ $blog->title}} </div>
            @else
                <div class="card-header"><a href="{{url('/blog/'.$blog->id)}}"
                                            style="color: brown">{{ $blog->title}} </a></div>
            @endif


            <div class="card-body">
                @if (strlen($blog->body)>300))
                {{ substr($blog->body,0,300)}}
                <a href="#" class=" "> ... Read more</a>
                @else
                    {{ $blog->body}}
                @endif
                <p>Written By {{$blog->user->name}}</p>

                <div class="row">
                    <div lass="col-md-6">
                        <form method="POST" action="/wipeBlog/{{$blog->id}}" class="float-md-right">
                            @csrf
                            <button type="submit" class="btn btn-default btn-xs waves-effect waves-classic"
                                    style="color:blue">
                                <i class="icon md-delete" aria-hidden="true"></i>Delete
                            </button>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <form method="POST" action="/restoreBlog/{{$blog->id}}" class="float-md-right">
                            @csrf
                            <button type="submit" class="btn btn-default btn-xs waves-effect waves-classic"
                                    style="color: red;">
                                <i class="icon md-restore" aria-hidden="true"></i>Restore
                            </button>
                        </form>
                    </div>

                </div>

            </div>

        </div>
    @endforeach
    {{ $allBlogs->links() }}
@endsection
