@extends('layout')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between">
        <h2>Book List</h2>
        <a href="{{ route('books.create') }}" class="btn btn-primary">Add New Book</a>
    </div>
    @if(session('success'))
        <div class="alert alert-success mt-3">{{ session('success') }}</div>
    @endif
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Published Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->published_date }}</td>
                    <td>
                        <a href="{{ route('books.show', $book->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning">Edit</a>
                        <button class="btn btn-danger delete-book" data-id="{{ $book->id }}">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    document.querySelectorAll('.delete-book').forEach(button => {
        button.addEventListener('click', function () {
            const bookId = this.getAttribute('data-id');
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            fetch(`/books/${bookId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            }).then(response => response.json())
              .then(data => {
                alert(data.success);
                location.reload();
              });
        });
    });
</script>
@endsection
