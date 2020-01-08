@extends('layouts.app')


@section('content')

<div class="card card-default">
	<div class="card-header">Create Post</div>

	<div class="card-body">
		<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
			@csrf

			<div class="form-group">
				<label for="title">Title</label>
				<input type="text" id="title" name="title" class="form-control">
			</div>

			<div class="form-group">
				<label for="description">Description</label>
				<textarea name="description" id="description" cols="5" rows="5" class="form-control"></textarea>
			</div>

			<div class="form-group">
				<label for="content">Content</label>
				<input type="hidden" id="content" name="content">
				<trix-editor input="content"></trix-editor>
			</div>

			<div class="form-group">
				<label for="published_at">Published at</label>
				<input type="text" id="published_at" name="published_at" class="form-control">
			</div>

			<div class="form-group">
				<label for="image">Image</label>
				<input type="file" id="image" name="image" class="form-control">
			</div>

			<div class="form-group">
				<button class="btn btn-success" type="submit">Create Post</button>
			</div>
			

		</form>
	</div>
</div>


@endsection

@section('css')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection

@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
	flatpickr('#published_at', {
		enableTime: true
	})
</script>

@endsection