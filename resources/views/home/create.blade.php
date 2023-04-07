@extends('layouts.app')
@section('title', 'Create')
@section('content')
    <form method="POST" action="{{ url('home') }}">
        @csrf
        <a href="{{ url("home") }}"> <-Back </a>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" placeholder="name" name="name">
        </div>
        <div class="mb-3">
            <label for="grade" class="form-label">Grade</label>
            <textarea class="form-control" id="grade" rows="3" placeholder="grade" name="grade"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection