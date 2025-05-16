@extends('layouts.app')

@section('content')
<div class="container-xl">
    <div class="page-header d-print-none">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">Create Book</h2>
            </div>
        </div>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('books.store') }}">
                    @csrf
                    <div class="row mb-3">
                        <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Title') }}</label>

                        <div class="col-md-6">
                            <input type="text" id="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autofocus />

                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="dimension_length" class="col-md-4 col-form-label text-md-end">{{ __('Dimension') }}</label>

                        <div class="col-md-6" style="display: inline-flex">
                            <div class="col-md-4">
                                <input type="number" max="40" min="15" id="dimension_length" class="form-control @error('dimension_length') is-invalid @enderror"
                                    name="dimension_length" value="{{ old('dimension_length') }}" required />
                            </div>
                            <div class="col-md-2 text-center mt-1"> cm X </div>
                            <div class="col-md-4">
                                <input type="number" max="30" min="15" id="dimension_height" class="form-control @error('dimension_height') is-invalid @enderror"
                                    name="dimension_height" value="{{ old('dimension_height') }}" required />
                            </div>
                            <div class="col-md-2 ms-4 mt-1"> cm</div>

                            @error('dimension_length')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            @error('dimension_height')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="publisher_id" class="col-md-4 col-form-label text-md-end">{{ __('Publisher') }}</label>

                        <div class="col-md-3">
                            <select required name="publisher_id" id="publisher_id" class="form-control" @error('publisher_id') is-invalid @enderror">
                                <option value="">-- Choose a Publisher --</option>
                                @foreach($publishers as $id => $name)
                                    <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach
                            </select>

                            @error('publisher_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="stock" class="col-md-4 col-form-label text-md-end">{{ __('Stock') }}</label>

                        <div class="col-md-2">
                            <input id="stock" type="number" max="20" class="form-control @error('stock') is-invalid @enderror" name="stock" value="{{ old('stock') }}" required />

                            @error('stock')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Create') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
