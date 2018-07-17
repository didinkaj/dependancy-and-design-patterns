@if (Route::has('login'))
    <div class="card rounded-0">
        @auth
            <div class="card-header">Quick Links</div>
            <ul class="list-group">
                <li class="list-group-item"><a href="{{url('/addBlog')}}">Add blog</a></li>
                <li class="list-group-item"><a href="{{url('/unpublished')}}">Deleted blogs <span
                                class="badge float-right"></span> </a></li>
                <li class="list-group-item"><a href="#">Registered users <span
                                class="badge float-right">{{ $allusersno }}</span></a></li>
                <li class="list-group-item"><a href="{{url('/userLogs')}}" style="color: red">Event Logs</a> </li>
            </ul>
            @else
                <div class="card-header">subscribe</div>
                <form method="POST" action="{{ route('subscribe') }}" >
                    @csrf

                    <div class="form-group row mt-4 p-2">
                        <label for="email"
                               class="col-sm-12 col-form-label text-md-center">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-10 offset-1 m-2">
                            <input id="email" type="email"
                                   class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                   value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class=" col-md-4 offset-4 ">
                            <button type="submit" class="btn btn-danger float-right ">
                                Subscribe
                            </button>
                        </div>
                    </div>
                </form>
                @endauth
    </div>

@endif
<div class="card mt-4 rounded-0 ">
    <div class="card-header">Recently Added</div>
    <ul class="list-group">
        @if (Route::has('login'))
            @auth
                @foreach($allBlogsForAll as  $blog)
                    <li class="list-group-item"><a href="{{url('/blog/'.$blog->id)}}">{{$blog->title}}</a></li>
                @endforeach
                @else
                    @foreach($allBlogsForAll as  $blog)
                        <li class="list-group-item"><a href="{{url('/showblog/'.$blog->id)}}">{{$blog->title}}</a></li>
                    @endforeach
                    @endauth
                @endif


    </ul>
</div>
