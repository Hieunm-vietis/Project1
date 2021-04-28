@extends ('layouts.layout_user')

@section('content')
<div class="row">
	<div class="col-12 mt-2 mb-3">
		<h1></h1>
        <div>
            <span>Name:</span>
            <span>{{ $user->name }}</span>
        </div>
        <div>
            <span>Email:</span>
            <span>{{ $user->email }}</span>
        </div>
        <div>
            <img src="https://i.pinimg.com/originals/76/18/38/761838420398ec0b0b412b46b71f2ab2.jpg" class="rounded-circle" alt="...">
        </div>
	</div>
    @php
        $isFollow = \App\Models\FollowUser::where('user_id', \Auth::user()->id)
                        ->where('user_follow_id', $user->id)
                        ->first();
    @endphp
    @if (!$isFollow && \Auth::user()->id != $user->id)
        <div>
            <button type="button" class="btn btn-info">+ Follow</button>
        </div>
    @endif
    <hr>
	<div class="col-12">
    @php
        $blogs = $user->blogs()->paginate(5);
    @endphp
        @foreach ($blogs as $blog)
			<div class="row mt-5">
				<div class="col-md-3 mr-3">
					<img src="{{ $blog->image }}" alt="" width="300px" height="150">
				</div>
				<div class="col-md-6 ml-4">
					<div> <span class="h5">{{ $blog->title }}</span>
					- 
					<span>
						<a class="h5" style="text-decoration: none" href="{{ route('user.users.show', $blog->user->id) }}">
							{{ $blog->user->name }}
						</a>
					</span>
					<div>{{ $blog->content }}</div>
                    <div>
                        <span><a type="button" style="text-decoration: none" href="{{ route('user.blogs.show', $blog->id) }}" >View >></a></span>
                    </div>
				</div>
			</div>
		@endforeach
	</div>
	<div class="col-md-12 justify-content-center">
		<div>
			{{ $blogs->links() }}
		</div>
	</div>
</div>
@stop()