@extends('layouts.app')

@section('title', 'Create Genre')

@section('content')
    <h1>Create Genre</h1>

    <form action="{{ route('genres.store') }}" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <button type="submit">Submit</button>
    </form>
@endsection
