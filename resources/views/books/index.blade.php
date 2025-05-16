@extends('layouts.app')

@section('content')
<div class="container-xl">
    <div class="page-header d-print-none">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">Book List</h2>
            </div>
        </div>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('books.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                    <i class="bi bi-plus"></i> Create
                </a>
            </div>
            <div class="table-responsive card-body p-0">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Title</th>
                            <th>Dimension</th>
                            <th>Publisher</th>
                            <th>Stock</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($books as $index => $book)
                            <tr>
                                <td>{{ $books->firstItem() + $index }}</td>
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->dimension }}</td>
                                <td>{{ $book->publisher->name }}</td>
                                <td>{{ $book->stock }}</td>
                                <td style="display: inline-flex;">
                                    <a href="{{ route('books.edit', $book) }}" class="text-blue-500 btn"><i class="bi bi-pencil-square"></i></a> 
                                    <form action="{{ route('books.destroy', $book) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-red-500 btn" type="submit"
                                            onClick="return confirm('Are you sure you want to delete this book?')">
                                            <i class="bi bi-trash3"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="card-body pt-0">{{ $books->links() }}</div>
        </div>
    </div>
</div>
@endsection
