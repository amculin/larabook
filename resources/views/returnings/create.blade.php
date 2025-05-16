@extends('layouts.app')

@section('content')
<div class="container-xl">
    <div class="page-header d-print-none">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">Return A Book</h2>
            </div>
        </div>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('returnings.store') }}">
                    @csrf
                    <div class="row mb-3">
                        <label for="book_id" class="col-md-4 col-form-label text-md-end">{{ __('Book Title') }}</label>

                        <div class="col-md-4">
                            <select required name="book_id" id="book_id" class="form-control" @error('book_id') is-invalid @enderror">
                                <option value="">-- Choose a Book --</option>
                                @foreach($books as $id => $title)
                                    <option value="{{ $id }}">{{ $title }}</option>
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
                            </select>

                            <input type="hidden" name="id" id="transaction_id" @error('id')
                                is-invalid
                            @enderror />

                            @error('member_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            @error('id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Return') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $('#book_id').change(function() {
            var bookId = $(this).val();
            $.ajax({
                url: '/returnings/members/' + bookId,
                type: 'GET',
                success: function(data) {
                    $('#member_id').empty();
                    $('#member_id').append('<option value="">-- Choose a Member --</option>');
                    $.each(data, function(key, value) {
                        $('#member_id').append('<option data-id="'+ value.id +'" value="'+ value.member_id +'">'+ value.member.full_name +'</option>');
                    });
                }
            });
        });

        $('#member_id').change(function() {
            var tId = $(this).find("option:selected").attr('data-id');

            $('#transaction_id').val(tId);
        })
    });
</script>
