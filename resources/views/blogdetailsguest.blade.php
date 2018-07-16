@extends('layouts.main')
@section('content')
    <div class="card mb-4">
        <div class="card-header">{{ $allBlogs->title}}
        </div>
        <div class="card-body">
            {{ $allBlogs->body}}

        </div>

    </div>


@endsection
