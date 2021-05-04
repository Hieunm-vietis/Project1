@extends ('layouts.layout_user')

@section('content')
<div class="row">
	<div class="col-12 mt-2 mb-3">
		<h1>Blogs</h1>
	</div>
	<div class="col-12">
		@foreach ($blogs as $blog)
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
				</div>
			</div>
			<hr>
		@endforeach
	</div>
</div>
<div class="row mt-5">
	<div class="col-md-12 justify-content-center">
		<div>
			{{ $blogs->links() }}
		</div>
	</div>
</div>
@stop()