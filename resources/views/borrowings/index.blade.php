@extends('layouts.app')

@section('content')
<div class="container-xl">
    <div class="page-header d-print-none">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">Borrowed Book List</h2>
            </div>
        </div>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('borrowings.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                    <i class="bi bi-plus"></i> Borrow A Book
                </a>
            </div>
            <div class="table-responsive card-body p-0">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Book Title</th>
                            <th>Borrower Name</th>
                            <th>Borrow Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($borrowings as $index => $borrowing)
                            <tr>
                                <td>{{ $borrowings->firstItem() + $index }}</td>
                                <td>{{ $borrowing->book->title }}</td>
                                <td>{{ $borrowing->member->full_name }}</td>
                                <td>{{ $borrowing->created_at }}</td>
                                <td style="display: inline-flex;">
                                    <a href="{{ route('borrowings.edit', $borrowing) }}" class="text-blue-500 btn"><i class="bi bi-pencil-square"></i></a> 
                                    <form action="{{ route('borrowings.destroy', $borrowing) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-red-500 btn" type="submit"
                                            onClick="return confirm('Are you sure you want to return this book?')">
                                            <i class="bi bi-box-arrow-in-down-left"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="card-body pt-0">{{ $borrowings->links() }}</div>
        </div>
    </div>
</div>
@endsection
