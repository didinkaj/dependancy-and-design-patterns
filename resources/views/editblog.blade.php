@extends('layouts.main')

@section('content')
    <div class="card p-4">

        <form method="POST" action="{{ url('edit/blog/'.$allBlogs->id) }}" class="offset-md-1 pt-4">
            @csrf
            {!! method_field('patch') !!}
            <div class="form-group row">
                <div class="col-sm-10">
                    <label for="inputTitle" >Blog Title</label>
                    <input type="text"  class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ $allBlogs->title }}" required autofocus class="form-control" id="inputTitle" placeholder="Blog Title">

                    @if ($errors->has('title'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <label for="inputdescription" >Category</label>
                    <input type="text"  class="form-control{{ $errors->has('category') ? ' is-invalid' : '' }}" name="category" value="{{ $allBlogs->category }}" required autofocus class="form-control" id="inputdescription" placeholder="Blog Category">

                    @if ($errors->has('category'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                <label for="blogContent">Blog Body</label>
                <textarea class="form-control"  class="form-control{{ $errors->has('body') ? ' is-invalid' : '' }}" name="body" value="{{ $allBlogs->body }}" required autofocusid="blogContent" rows="5">
                    {{ $allBlogs->body }}
                </textarea>

                    @if ($errors->has('body'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10">
                    <a href="{{url('/home')}}" class="btn btn-secondary float-left">Cancel</a>
                    <button type="submit" class="btn btn-success float-right">Save Changes </button>
                </div>
            </div>
        </form>
    </div>
@endsection