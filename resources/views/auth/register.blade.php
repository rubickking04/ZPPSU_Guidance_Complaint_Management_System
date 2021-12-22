@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header text-center fw-bold">{{ __('Register') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="container row g-2">
                    {{--  <h5 class="card-title text-center fw-bolder">{{ __('Registration Form') }}</h5>  --}}
                        <div class="col-md-4">
                            <label for="name"  class="form-label fw-bolder">{{ __('Name:') }}</label>
                            <input id="name" type="text" placeholder="Enter your name" class="form-control border border-primary @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="username"  class="form-label fw-bolder">{{ __('Username:') }}</label>
                            <input id="username" type="text" placeholder="Enter your username" class="form-control border border-primary @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" autocomplete="username" autofocus>
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="gender"  class="form-label fw-bolder">{{ __('Gender:') }}</label>
                            <select id="gender" type="text" class="form-control form-select border border-primary @error('gender') is-invalid @enderror" name="gender" value="{{ old('gender') }}" autocomplete="gender" autofocus>
                                <option disabled selected>{{ ('Choose your gender...') }}</option>
                                <option value="Male">{{ __('Male') }}</option>
                                <option value="Female">{{ __('Female') }}</option>
                            </select>
                            @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                            <div class="col-md-6">
                                <label for="email" class="form-label fw-bolder">{{ __('E-Mail Address:') }}</label>
                                <input id="email" type="email"  placeholder="Enter valid email address (ex: admin@gmail.com)" class="form-control border border-primary @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="form-label fw-bolder">{{ __('Phone Number:') }}</label>
                                <input id="phone" type="tel"  placeholder="Enter your phone number" class="form-control border border-primary @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" autocomplete="phone">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        <div class="col-md-12">
                            <label for="address" class="form-label fw-bolder">{{ __('Address:') }}</label>
                            <input id="address" type="text"  placeholder="Enter your address" class="form-control border border-primary  @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" autocomplete="address">
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                            <div class="col-md-6">
                                <label for="birth_date" class="form-label fw-bolder">{{ __('Date of Birth:') }}</label>
                                <input id="birth_date" type="date" class="form-control border border-primary" name="birth_date" value="{{ old('birth_date') }}">
                                @error('birth_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="image" class="form-label fw-bolder">{{ __('Profile Photo:') }}</label>
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control border border-primary  @error('image') is-invalid @enderror" id="inputGroupFile01" aria-label="file example" name="image" value="{{ old('image') }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                            <label for="password" class="form-label fw-bolder">{{ __('Password:') }}</label>
                                <input id="password" type="password"  placeholder="Enter your password" class="form-control border border-primary @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="col-auto">
                                    <span id="password" class="form-text">
                                        {{ __('Password must be 8-20 characters long.') }}
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="password-confirm" class="form-label fw-bolder">{{ __('Confirm Password:') }}</label>
                                <input id="password-confirm" type="password" placeholder="Confirm your password"  class="form-control border border-primary @error('password-confirm') is-invalid @enderror" name="password_confirmation" autocomplete="new-password">
                                @error('password-confirm')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-dark">
                                    <lord-icon
                                        src="https://cdn.lordicon.com/xhwleznj.json"
                                        trigger="loop"
                                        colors="primary:#121331,secondary:#ffffff"
                                        style="width:30px;height:30px">
                                    </lord-icon>
                                    {{ __('Register') }}
                                </button>
                                <a class="btn btn-link" href= "{{ route('login')}}">I have already an account</a>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

