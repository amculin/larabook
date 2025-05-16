@extends('layouts.app')

@section('content')
<div class="container-xl">
    <div class="page-header d-print-none">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">Update Member</h2>
            </div>
        </div>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('members.update', $member->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label for="id" class="col-md-4 col-form-label text-md-end">{{ __('NIK') }}</label>

                        <div class="col-md-6">
                            <input type="number" max="9999999999999999" id="id" class="form-control @error('id') is-invalid @enderror"
                                name="id" value="{{ old('id', $member->id) }}" required readonly autofocus />

                            @error('id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="full_name" class="col-md-4 col-form-label text-md-end">{{ __('Full Name') }}</label>

                        <div class="col-md-6">
                            <input id="full_name" class="form-control @error('full_name') is-invalid @enderror" name="full_name"
                                value="{{ old('full_name', $member->full_name) }}" required />

                            @error('full_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="birth_date" class="col-md-4 col-form-label text-md-end">{{ __('Birth Date') }}</label>

                        <div class="col-md-6">
                            <input id="birth_date" type="date" class="form-control @error('birth_date') is-invalid @enderror"
                                name="birth_date" value="{{ old('birth_date', $member->birth_date) }}" required />

                            @error('birth_date')
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
                                required>{{ old('address', $member->address) }}</textarea>

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
