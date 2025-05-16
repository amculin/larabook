@extends('layouts.app')

@section('content')
<div class="container-xl">
    <div class="page-header d-print-none">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">Member List</h2>
            </div>
        </div>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('members.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                    <i class="bi bi-plus"></i> Create
                </a>
            </div>
            <div class="table-responsive card-body p-0">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>ID</th>
                            <th>Full Name</th>
                            <th>Birth Date</th>
                            <th>Address</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($members as $index => $member)
                            <tr>
                                <td>{{ $members->firstItem() + $index }}</td>
                                <td>{{ $member->id }}</td>
                                <td>{{ $member->full_name }}</td>
                                <td>{{ $member->birth_date }}</td>
                                <td>{{ $member->address }}</td>
                                <td style="display: inline-flex;">
                                    <a href="{{ route('members.edit', $member) }}" class="text-blue-500 btn"><i class="bi bi-pencil-square"></i></a> 
                                    <form action="{{ route('members.destroy', $member) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-red-500 btn" type="submit"
                                            onClick="return confirm('Are you sure you want to delete this member?')">
                                            <i class="bi bi-trash3"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="card-body pt-0">{{ $members->links() }}</div>
        </div>
    </div>
</div>
@endsection
