@extends('layout')

@section('content')
<div class="container">
    <h2>Book Details</h2>
    <div class="card mt-3">
        <div class="card-body">
            <h5 class="card-title">{{ $book->title }}</h5>
            <p class="card-text"><strong>Author:</strong> {{ $book->author }}</p>
            <p class="card-text"><strong>Description:</strong> {{ $book->description }}</p>
            <p class="card-text"><strong>Published Date:</strong> {{ $book->published_date }}</p>
            <a href="{{ route('books.index') }}" class="btn btn-primary">Back to List</a>
        </div>
    </div>
</div>
@endsection
