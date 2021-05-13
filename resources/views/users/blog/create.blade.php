@extends ('layouts.layout_user')

@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="row justify-content-center ">
                <div class="col-8">
                    <div class="text-center mt-5 mb-5 ">
                        <h1>Create blog</h1>
                    </div>
                    <form method="POST" action="{{ route('user.blogs.store') }}" enctype='multipart/form-data'>
		                {{ csrf_field() }}

                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input class="form-control" name="title" id="title" value="{{ old('title') }}">
                            @if ($errors->has('title'))
                                <p class="text-danger">
                                    {{ $errors->first('title') }}
                                </p>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Content</label>
                            <textarea class="form-control" rows="5" name="content" id="content">
                                {{ old('content') }}
                            </textarea>
                            @if ($errors->has('content'))
                                <p class="text-danger">
                                    {{ $errors->first('content') }}
                                </p>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Image</label>
                            <input type="file" name="image" required="true">
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop()