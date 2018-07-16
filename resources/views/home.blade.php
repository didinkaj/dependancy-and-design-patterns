@extends('layouts.main')
@section('content')
    @foreach($allBlogs as $blog)
        <div class="card mb-4">
            @if($blog->deleted_at != null)
                <div class="card-header">{{ $blog->title}} </div>
                @else
                <div class="card-header"><a href="{{url('/blog/'.$blog->id)}}" style="color: brown">{{ $blog->title}} </a></div>
                @endif


            <div class="card-body">
                @if (strlen($blog->body)>300))
                    {{ substr($blog->body,0,300)}}
                    <a href="{{url('/blog/'.$blog->id)}}" class=" "> ... Read more</a>
                @else
                    {{ $blog->body}}
                @endif
                <p>Written By {{$blog->user->name}}</p>
            </div>

        </div>
    @endforeach
    {{ $allBlogs->links() }}
@endsection
