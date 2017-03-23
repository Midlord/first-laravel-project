@extends('layout.default')


@section('content')
<h1>This To-Do</h1>

<div>ID: {{ $todo->id }}</div>
<div>Name: {{ $todo->name }}</div>

@stop