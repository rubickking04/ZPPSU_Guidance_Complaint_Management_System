@extends('layouts.app')

@section('content1')
<div class="col-md-8">
    <div class="card shadow mb-5">
        <div class="card-body">
            <div class="">
                <h4 class="text-center">{{ ('User\'s Information') }}</h4>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-3">
                    <p class="mb-0">Fullname</p>
                </div>
                <div class="col-sm-9">
                    <p class="text-muted mb-0">{{ Auth::user()->name }}</p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <p class="mb-0">Username</p>
                </div>
                <div class="col-sm-9">
                    <p class="text-muted mb-0">{{ Auth::user()->username }}</p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <p class="mb-0">Email</p>
                </div>
                <div class="col-sm-9">
                    <p class="text-muted mb-0">{{ Auth::user()->email }}</p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <p class="mb-0">Birthday</p>
                </div>
                <div class="col-sm-9">
                    <p class="text-muted mb-0">{{ Auth::user()->birth_date }}</p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <p class="mb-0">Phone</p>
                </div>
                <div class="col-sm-9">
                    <p class="text-muted mb-0">{{ Auth::user()->phone }}</p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <p class="mb-0">Gender</p>
                </div>
                <div class="col-sm-9">
                    <p class="text-muted mb-0">{{ Auth::user()->gender }}</p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                    <p class="mb-0">Address</p>
                </div>
                <div class="col-sm-9">
                    <p class="text-muted mb-0">{{ Auth::user()->address }}</p>
                </div>
            </div>
            <hr>
            <div class="mb-3 row">
                <div class="text-start">
                    <button type="button" class="btn btn-primary text-white"  data-bs-toggle="modal" data-bs-target="#exampleModalCenter">{{ __('Edit Profile') }}</button>
                </div>
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">{{ __('Update Profile') }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ url('/home/update') }}">
                                @csrf
                                <div class="row">
                                <div class="col-md-6">
                                    <label for="name"  class="form-label fw-bolder">{{ __('Name:') }}</label>
                                    <input id="name" type="text" placeholder="Enter your name" class="form-control border border-primary @error('name') is-invalid @enderror" name="name" value="{{ Auth::user()->name }}" autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="username"  class="form-label fw-bolder">{{ __('Username:') }}</label>
                                    <input id="username" type="text" placeholder="Enter your username" class="form-control border border-primary @error('username') is-invalid @enderror" name="username" value="{{ Auth::user()->username }}" autocomplete="username" autofocus>
                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="md-3">
                                    <label for="email" class="form-label fw-bolder">{{ __('E-Mail Address:') }}</label>
                                    <input id="email" type="email"  placeholder="Enter valid email address (ex: admin@gmail.com)" class="form-control border border-primary @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}" autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="md-3">
                                    <label for="phone" class="form-label fw-bolder">{{ __('Phone Number:') }}</label>
                                    <input id="phone" type="tel"  placeholder="Enter your phone number" class="form-control border border-primary @error('phone') is-invalid @enderror" name="phone" value="{{ Auth::user()->phone }}" autocomplete="phone">
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="md-3">
                                    <label for="address" class="form-label fw-bolder">{{ __('Address:') }}</label>
                                    <input id="address" type="text"  placeholder="Enter your address" class="form-control border border-primary  @error('address') is-invalid @enderror" name="address" value="{{ Auth::user()->address }}" autocomplete="address">
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-dark">{{ __('Submit Changes') }}</button>
                            </form>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
