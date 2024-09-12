@extends('layout')

@section('content')
<div class="container">
    <h2>Edit Book</h2>
    <form id="bookForm" action="{{ route('books.update', $book->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $book->title ?? old('title') }}">
        </div>

        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" name="author" class="form-control" value="{{ $book->author ?? old('author') }}">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control">{{ $book->description ?? old('description') }}</textarea>
        </div>

        <div class="form-group">
            <label for="published_date">Published Date</label>
            <input type="date" name="published_date" class="form-control" value="{{ $book->published_date ?? old('published_date') }}">
        </div>

        <button type="submit" class="btn btn-success mt-3">Update</button>
    </form>

    <script>
        document.querySelector('#bookForm').addEventListener('submit', function (event) {
            event.preventDefault();

            const form = event.target;
            const formData = new FormData(form);

            fetch(form.action, {
                method: form.method,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: formData,
            })
            .then(response => response.json())
            .then(data => {
                alert(data.success);
                window.location.href = '/books';
            });
        });
    </script>
</div>
@endsection
