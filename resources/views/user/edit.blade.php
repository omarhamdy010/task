@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Transaction') }}</div>

                    <div class="card-body">
                        <form method="post" action="{{url('/user/update/'.$user->id)}}">
                            @csrf
                            @method('put')
                            <div class="row mb-3">
                                <label for="balance"
                                       class="col-md-4 col-form-label text-md-end">{{ __('balance') }}</label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control @error('balance') is-invalid @enderror" value="{{ $user->balance }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="name"
                                       class="col-md-4 col-form-label text-md-end">{{ __('name') }}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="old_password"
                                       class="col-md-4 col-form-label text-md-end">{{ __('old_password') }}</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="new_password"
                                       class="col-md-4 col-form-label text-md-end">{{ __('new_password') }}</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="confirm_new_password"
                                       class="col-md-4 col-form-label text-md-end">{{ __('confirm_new_password') }}</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control @error('confirm_new_password') is-invalid @enderror" name="confirm_new_password">
                                </div>
                            </div>
                            <input type="hidden" value="{{$user->id}}" class="form-control" name="id">

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('update') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
