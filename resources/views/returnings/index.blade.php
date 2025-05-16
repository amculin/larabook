@extends('layouts.app')

@section('content')
<div class="container-xl">
    <div class="page-header d-print-none">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">Returned Book List</h2>
            </div>
        </div>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('returnings.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                    <i class="bi bi-plus"></i> Return A Book
                </a>
            </div>
            <div class="table-responsive card-body p-0">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Book Title</th>
                            <th>Borrower Name</th>
                            <th>Returned Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($returnings as $index => $returning)
                            <tr>
                                <td>{{ $returnings->firstItem() + $index }}</td>
                                <td>{{ $returning->book->title }}</td>
                                <td>{{ $returning->member->full_name }}</td>
                                <td>{{ $returning->created_at }}</td>
                                <td style="display: inline-flex;">
                                    <a href="{{ route('returnings.edit', $returning) }}" class="text-blue-500 btn"><i class="bi bi-pencil-square"></i></a> 
                                    <form action="{{ route('returnings.destroy', $returning) }}" method="POST" class="inline">
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

            <div class="card-body pt-0">{{ $returnings->links() }}</div>
        </div>
    </div>
</div>
@endsection
