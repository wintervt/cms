@extends('layouts.app')


@section('content')

	<div class="d-flex justify-content-end mb-2">
		<a href="{{ route('posts.create')}}" class="btn btn-success float-right">Users</a>
	</div>

	<div class="card card-default">
		<div class="card-header">Posts</div>

		<div class="card-body">

			@if($users->count() > 0)
			<table class="table">
				<thead>
					<th>Image</th>
					<th>Name</th>
					<th>Email</th>
					<th></th>
					<th></th>
				</thead>

				<tbody>

					@foreach ($users as $user)
					<tr>
						<td>
							<img src="{{ Gravatar::src($user->email) }}" alt='avatar' class="img-fluid">
						</td>
						<td>
							{{ $user->name }}
						</td>

						<td>
							{{ $user->email }}
						</td>

						<td>
							@if(!$user->isAdmin())
							<form action="{{ route('users.make-admin', $user->id) }}" method='POST'>
								@csrf
								<button type='submit' class="btn btn-success btn-sm">Make admin</button>
							</form>
							@elseif(isset($user->role))
								{{ $user->role }}
							@endif
						</td>
					</tr>
					@endforeach

				</tbody>
			</table>

			@else
			<h3 class="text-center">No Users yet</h3>
			@endif

		</div>
	</div>

@endsection