<!-- Modal -->
<div class="modal fade" id="editBlogModal" tabindex="-1" aria-labelledby="editBlogModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="editBlogModalLabel">Edit Blog</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="post" action="{{ route('user.blogs.update', $blog->id) }}">
                @csrf
                {{ method_field('PUT') }}
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input class="form-control" name="title" id="title" value="{{ old('title', \Arr::get($blog, 'title')) }}">
                    @if ($errors->has('title'))
                        <p class="text-danger">
                            {{ $errors->first('title') }}
                        </p>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea class="form-control" rows="5" name="content" id="content">
                        {{ old('content', \Arr::get($blog, 'content')) }}
                    </textarea>
                    @if ($errors->has('content'))
                        <p class="text-danger">
                            {{ $errors->first('content') }}
                        </p>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </form>
        </div>
    </div>
  </div>
</div>