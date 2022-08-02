@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Transaction') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('store.transaction') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name"
                                       class="col-md-4 col-form-label text-md-end">{{ __('choose_user') }}</label>

                                <div class="col-md-6">
                                    <select class="form-control" name="user">
                                        <option value="0">select user</option>
                                        @foreach($users as $user)
                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-end">{{ __('amount') }}</label>

                                <div class="col-md-6">
                                    <input id="amount" type="number"
                                           class="form-control @error('amount') is-invalid @enderror" name="amount"
                                           value="{{ old('amount') }}">

                                    @error('amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class='col-md-4 col-form-label text-md-end'>Card Number</label>
                                <div class='col-md-6'>
                                    <input autocomplete='off' class='form-control card-number' size='16' type='number'>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class='col-md-4 col-form-label text-md-end'>Card Name</label>
                                <div class='col-md-6'>
                                    <input autocomplete='off' value="visa" class='form-control card-name' type='text'>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class='col-md-4 col-form-label text-md-end'>cvc</label>
                                <div class='col-md-6'>
                                    <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class='col-md-4 col-form-label text-md-end'>Expiration Month</label>
                                <div class='col-md-6'>
                                    <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class='col-md-4 col-form-label text-md-end'>Expiration Year</label>
                                <div class='col-md-6'>
                                    <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('create') }}
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
