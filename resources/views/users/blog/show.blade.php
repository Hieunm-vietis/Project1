@extends ('layouts.layout_user')

@section('content')
<div class="row mt-5">
    <div class="col-md-3 mr-3">
        <img src="{{ $blog->image }}" alt="" width="300px" height="150">
    </div>
    <div class="col-md-6 ml-4">
        <div class="h5"> <span>{{ $blog->title }}</span>
        - 
        <span>
            <a class="h5" style="text-decoration: none" href="{{ route('user.users.show', $blog->user->id) }}">
                {{ $blog->user->name }}
            </a>
        </span>
        <div>{{ $blog->content }}</div>
        <div class="mt-2">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editBlogModal">
                Edit
            </button>
            <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{ route('user.blogs.delete', $blog->id) }}">
                Delete
            </a>
        </div>
    </div>
</div>
@include('users.blog.partials.edit', ['blog' => $blog])
@stop()
