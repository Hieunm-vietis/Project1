@extends ('layouts.layout_user')

@section('content')
<div class="row">
	<div class="col-md-10">
        <div>
            <p class="h4">{{ $blog->title }}</p>
        </div>
        <div>
            <img src="{{ $blog->image }}" alt="" width="300px" height="150">
        </div>
        <div>
            {{ $blog->content }}
        </div>
        @if($blog->user_id == \Auth::user()->id)
            <div class="mt-2">
                <a type="button" href="{{ route('user.blogs.edit', $blog->id) }}" class="btn btn-secondary">Edit</a>
                <a type="button" href="" class="btn btn-danger">Delete</a>
            </div>
        @endif
    </div>
</div>

@stop()