@extends('layouts.app')

@section('content')
<div class="container-xl">
    <div class="page-header d-print-none">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">Edit A Borrowing</h2>
            </div>
        </div>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('borrowings.update', $borrowing->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label for="book_id" class="col-md-4 col-form-label text-md-end">{{ __('Book Title') }}</label>

                        <div class="col-md-4">
                            <select required name="book_id" id="book_id" class="form-control" @error('book_id') is-invalid @enderror">
                                <option value="">-- Choose a Book --</option>
                                @foreach($books as $id => $title)
                                    <option value="{{ $id }}" {{ $borrowing->book_id == $id ? 'selected' : '' }}>{{ $title }}</option>
                                @endforeach
                            </select>

                            @error('book_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="member_id" class="col-md-4 col-form-label text-md-end">{{ __('Member Name') }}</label>

                        <div class="col-md-4">
                            <select required name="member_id" id="member_id" class="form-control" @error('member_id') is-invalid @enderror">
                                <option value="">-- Choose a Member --</option>
                                @foreach($members as $id => $name)
                                    <option value="{{ $id }}" {{ $borrowing->member_id == $id ? 'selected' : '' }}>{{ $name }}</option>
                                @endforeach
                            </select>

                            @error('member_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
