@extends('layouts.app')

@section('title', 'Create Genre')

@section('content')
    <div class="container">
        <h1>Create a New Book</h1>

        <form method="POST" action="{{ route('books.store') }}">
            @csrf

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
            </div>

            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" name="author" id="author" class="form-control" value="{{ old('author') }}">
            </div>

            <div class="form-group">
                <label for="genre_id">Genre</label>
                <select name="genre_id" id="genre_id" class="form-control">
                    @foreach($genres as $genre)
                        <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="publication_year">Publication Year</label>
                <input type="number" name="publication_year" id="publication_year" class="form-control" value="{{ old('publication_year') }}">
            </div>

            <button type="submit" class="btn btn-primary">Create Book</button>
        </form>
    </div>
@endsection
