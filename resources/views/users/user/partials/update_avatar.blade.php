<!-- Modal -->
<div class="modal fade" id="updateAvatarModal" tabindex="-1" aria-labelledby="updateAvatarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="updateAvatarModalLabel">Edit Blog</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('user.users.updateAvatar') }}" enctype='multipart/form-data' method="POST">
		        {{ csrf_field() }}
		        @if ($errors->any())
					<div class="alert alert-danger">
			   			<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
				        </ul>
				    </div>			
				@endif
		        <input type="file" name="image" required="true">
		        	<br/>
		        <input type="submit" class="mt-2 btn btn-primary" value="upload">
		    </form>
        </div>
    </div>
  </div>
</div>