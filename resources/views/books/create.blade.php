@extends('layout')

@section('content')
<div class="container">
    <h2>Add New Book</h2>
    <form id="bookForm" action="{{ route('books.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}">
        </div>

        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" name="author" class="form-control" value="{{ old('author') }}">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control">{{ old('description') }}</textarea>
        </div>

        <div class="form-group">
            <label for="published_date">Published Date</label>
            <input type="date" name="published_date" class="form-control" value="{{ old('published_date') }}">
        </div>

        <button type="submit" class="btn btn-success mt-3">Create</button>
    </form>

</div>
@endsection

<script>
    document.querySelector('#bookForm').addEventListener('submit', function(event) {
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