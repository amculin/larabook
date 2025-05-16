@extends('layouts.app')

@section('content')
<div class="container-xl">
    <div class="page-header d-print-none">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">Publisher List</h2>
            </div>
        </div>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('publishers.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                    <i class="bi bi-plus"></i> Create
                </a>
            </div>
            <div class="table-responsive card-body p-0">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Publisher Name</th>
                            <th>Address</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($publishers as $index => $publisher)
                            <tr>
                                <td>{{ $publishers->firstItem() + $index }}</td>
                                <td>{{ $publisher->name }}</td>
                                <td>{{ $publisher->address }}</td>
                                <td style="display: inline-flex;">
                                    <a href="{{ route('publishers.edit', $publisher) }}" class="text-blue-500 btn"><i class="bi bi-pencil-square"></i></a> 
                                    <form action="{{ route('publishers.destroy', $publisher) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-red-500 btn" type="submit"
                                            onClick="return confirm('Are you sure you want to delete this publisher?')">
                                            <i class="bi bi-trash3"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="card-body pt-0">{{ $publishers->links() }}</div>
        </div>
    </div>
</div>
@endsection
