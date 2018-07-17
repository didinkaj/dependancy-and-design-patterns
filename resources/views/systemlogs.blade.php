@extends('layouts.main')
@section('content')


        @isset($logs)
            @foreach($logs as $index => $log)
                <div class="card mb-4 ">
                <div class="card-header">{{$index + 1}}  {{$log->email}} {{$log->created_at->diffForHumans()}} <span class="float-md-right"></span>
                </div>
                <div class="card-body ">
                    <p>{{$log->message}}</p>
                </div>
                </div>
            @endforeach


            {{ $logs->links() }}

        @endisset





@endsection
