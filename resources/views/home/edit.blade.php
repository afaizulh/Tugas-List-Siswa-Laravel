@extends('layouts.app')
@section('title', 'Create')
@section('content')
    <form method="POST" action="{{ url("home/{$data->slug}") }}">
        @method('PATCH')
        @csrf

        <a href="{{ url("home") }}"> <-Back </a>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $data->name }}" required>
        </div>
        <div class="mb-3">
            <label for="grade" class="form-label">Grade</label>
            <input type="text" class="form-control" id="grade" name="grade" value="{{ $data->grade }}" required></input>
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
@endsection