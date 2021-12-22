@extends('layouts.app')
@section('content1')
<div class="col-md-8">
    <div class="card shadow">
            {{--  <div class="card-header text-center">{{ __('Complains') }}</div>  --}}
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form method="POST" action="{{ route('complaint') }}">
            @csrf
                <div class="container row g-3">
                    <div class="cold-md-12">
                        <label for="body" class="form-label">{{ __('Complain Message:') }}</label>
                        <textarea type="text" rows="4" placeholder="{{ __('What\'s on your mind, '.Auth::user()->name.'?') }}" class="form-control border border-primary @error('body') is-invalid @enderror" id="body" name="body" value="{{ old('body') }}"></textarea>
                        @error('body')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="department" class="form-label">{{ __('College Department: ') }}</label>
                            <select name="department" id="department" class="form-control form-select my-select border border-primary @error('department') is-invalid @enderror">
                                <option disabled selected>Choose...</option>
                                <option value="CET">College of Engineering & Technology</option>
                                <option value="CAHSS">College of Arts, Humanities & Social Sciences</option>
                                <option value="CTE">College of Teacher Education</option>
                                <option value="CME">College of Maritime Education</option>
                                <option value="CTechEd">College of Technical Education</option>
                                <option value="CICS">College of Information and Computing Sciences</option>
                                <option value="Senior High School">Senior High School</option>
                                <option value="Graduate School">Graduate School</option>
                            </select>
                        @error('department')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="category" class="form-label">{{ __('Categories: ') }}</label>
                            <select name="category" id="category" class="form-control form-select my-select border border-primary @error('category') is-invalid @enderror">
                                <option disabled selected>Select one...</option>
                                <option value="ID">{{ __('ID') }}</option>
                                <option value="Schedules">{{ __('Schedules') }}</option>
                                <option value="Grades">{{ __('Grades') }}</option>
                                <option value="Other">{{ __('Others') }}</option>
                            </select>
                        @error('category')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="course_and_section" class="form-label">{{ __('Course and Section:') }}</label>
                        <input id="course_and_section" type="text" placeholder="Enter your course and section" class="form-control border border-primary @error('course_and_section') is-invalid @enderror" name="course_and_section" value="{{ old('course_and_section') }}" autocomplete="course_and_section" autofocus>
                        @error('course_and_section')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <label for="image" class="form-label">Input Image: </label>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control border border-primary @error('image') is-invalid @enderror" id="inputGroupFile01" name="image" aria-describedby="inputGroupFileAddon01">
                        </div>
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-6 ">
                        <button type="submit" class="btn btn-primary">{{ __('Submit Complain') }}</button>
                        <a href="{{ url('/history') }}" class="btn btn-info">{{ __('View all in history') }}</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
