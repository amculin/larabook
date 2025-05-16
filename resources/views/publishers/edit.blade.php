@extends('layouts.app')

@section('content')
<div class="container-xl">
    <div class="page-header d-print-none">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">Update Publisher</h2>
            </div>
        </div>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('publishers.update', $publisher->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Publisher Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name', $publisher->name) }}" required />

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>

                        <div class="col-md-6">
                            <textarea id="address" class="form-control @error('address') is-invalid @enderror" name="address"
                                required>{{ old('address', $publisher->address) }}</textarea>

                            @error('address')
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
