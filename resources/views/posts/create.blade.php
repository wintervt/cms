@extends('layouts.app')


@section('content')

<div class="card card-default">
	<div class="card-header">
	{{ isset($post) ? 'Edit Post' : 'Create Post'}}
	</div>

	<div class="card-body">
		@include('partials.errors')
		<form action="{{ isset($post) ? route('posts.update', $post->id) : route('posts.store') }}" method="POST" enctype="multipart/form-data">
			@csrf
			
			@if(isset($post))
				@method('PUT')
			@endif

			<div class="form-group">
				<label for="title">Title</label>
				<input type="text" id="title" name="title" class="form-control" value="{{ isset($post) ? $post->title : '' }}">
			</div>

			<div class="form-group">
				<label for="description">Description</label>
				<textarea name="description" id="description" cols="5" rows="5" class="form-control">{{ isset($post) ? $post->description : '' }}</textarea>
			</div>

			<div class="form-group">
				<label for="content">Content</label>
				<input type="hidden" id="content" name="content" value="{{ isset($post) ? $post->content : '' }}">
				<trix-editor input="content"></trix-editor>
			</div>

			<div class="form-group">
				<label for="published_at">Published at</label>
				<input type="text" id="published_at" name="published_at" class="form-control" value="{{ isset($post) ? $post->published_at : '' }}">
			</div>

			@if(isset($post))
				<div class="form-group">
					<img src="{{ asset("storage/" .$post->image) }}" alt="post image" class="img-fluid">
				</div>
			@endif

			<div class="form-group">
				<label for="image">Image</label>
				<input type="file" id="image" name="image" class="form-control">
			</div>

			<div class="form-group">
				<label for="category">Category</label>
				<select name="category" id="category" class="form-control">
					@foreach($categories as $category)

						

						<option value="{{ $category->id }}"

						@if(isset($post))	
							@if($category->id == $post->category_id)
							selected
							@endif
						@endif
							>
							{{ $category->name }}
						</option>


					@endforeach
				</select>
			</div>

			<div class="form-group">
				<label for="tags">Tags</label>

				@if($tags->count() > 0)
					<select name="tags[]" id="tags" class="form-control tags-selector" multiple>
						@foreach($tags as $tag)

							<option value="{{ $tag->id }}"
							@if(isset($post))
								@if( $post->hasTag($tag->id) )
									selected
								@endif
							@endif
							>
								{{ $tag->name }}
							</option>


						@endforeach
					</select>
				@endif

			</div>

			<div class="form-group">
				@if(isset($post))
					<button class="btn btn-success" type="submit">Update Post</button>
				@else
					<button class="btn btn-success" type="submit">Create Post</button>
				@endif
			</div>
			

		</form>
	</div>
</div>


@endsection

@section('css')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
<script>
	flatpickr('#published_at', {
		enableTime: true,
		enableSeconds: true
	});

	$(document).ready(function() {
		$('.tags-selector').select2();
	});

</script>

@endsection