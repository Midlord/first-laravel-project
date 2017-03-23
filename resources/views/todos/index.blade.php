@extends('layout.default')

@push('css-plugins')
CSS NG INDEX DITO KUNWARE
@endpush

@section('content')

<h1>List of To-Do:</h1>

<a href="/todos/create">Create To-Do</a>

@if( session('status') === 'confirm' )
	<div>
		<h1>Are you sure you want to delete {{ session('todo')->id }} ?</h1>
		<a href="/todos">Cancel</a>
		<form action="/todos/{{ session('todo')->id }}" method="POST">
			{{ method_field("DELETE") }} {{ csrf_field() }}
			<button type="submit">Delete</button>
		</form>
	</div>

@elseif( session('status') === 'success-store')
	<h1>Successfully Created</h1>
@elseif( session('status') === 'success-update')
	<h1>Successfully Updated</h1>
@elseif( session('status') === 'success-destroy' )
	<h1>Successfully Deleted</h1>
@endif

<table>
	<thead>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Actions</th>
		</tr>
	</thead>

	<tbody>
		@if(count($todos) > 0)
			@foreach($todos as $todo)
				<tr>
					<td>{{ $todo->id }}</td>
					<td>{{ $todo->name }}</td>
					<td>
						<a href="/todos/{{ $todo->id }}">View</a>
						<a href="/todos/{{ $todo->id }}/edit">Edit</a>
						<a href="/todos/{{ $todo->id }}/delete">Delete</a>
					</td>
				</tr>
			@endforeach
		@else
			<tr>
				<td colspan="3">No Data</td>
			</tr>
		@endif
	</tbody>
</table>

@stop