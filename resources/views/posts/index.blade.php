@extends('layouts.app')


@section('content')

	<div class="d-flex justify-content-end mb-2">
		<a href="{{ route('posts.create')}}" class="btn btn-success float-right">Add Post</a>
	</div>

	<div class="card card-default">
		<div class="card-header">Posts</div>

		<div class="card-body">

			@if($posts->count() > 0)
			<table class="table">
				<thead>
					<th>Image</th>
					<th>Title</th>
					<th></th>
					<th></th>
				</thead>

				<tbody>

					@foreach ($posts as $post)
					<tr>
						<td>
							<img class="img-fluid" src="{{ asset("storage/" . $post->image) }}" alt="" width="200px" height="120px">	
						</td>
						<td>
							{{ $post->title }}
						</td>

						@if($post->trashed())

						<td>
							<form action="{{ route('restore-posts', $post->id) }}" method="POST">
								@csrf
								@method('PUT')
								<button type="submit" class="btn btn-info btn-sm">Restore</button>
							</form>
						</td>

						@else

						<td>
							<a href="{{ route('posts.edit', $post->id) }}" class="btn btn-info btn-sm">Edit</a>
						</td>

						@endif

						<td>
							<form action="{{ route('posts.destroy', $post->id ) }}" method="POST">
								@csrf
								@method('DELETE')

								<button class="btn btn-danger btn-sm" type="submit">
									{{ $post->trashed() ? 'Delete' : 'Trash'}}
								</button>

							</form>
						</td>
					</tr>
					@endforeach

				</tbody>
			</table>

			@else
			<h3 class="text-center">No Posts yet</h3>
			@endif

		</div>
	</div>

@endsection