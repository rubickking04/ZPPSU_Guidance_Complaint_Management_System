@extends('admin.layouts.app')

@section('contents')
<div class="card shadow">
    <div class="card-header text-sm-center font-weight-bold"><i class="bi bi-person-circle me-3"></i>{{ __('Admin\'s Table') }}</div>
        <div class="container">
            <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">{{ session('status') }}</div>
            @endif
                <div class="table-responsive-sm ">
                    <table class="table  table-sm text-center ">
                        <thead>
                            <tr>
                                <th scope="col">{{ __('Admin\'s ID') }}</th>
                                <th scope="col">{{ __('Admin\'s Name') }}</th>
                                <th scope="col">{{ __('Admin\'s Email') }}</th>
                                <th scope="col">{{ __('Joined at') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">{{ Auth::user()->id }}</td>
                                <td scope="row">{{ Auth::user()->name }}</td>
                                <td scope="row">{{ Auth::user()->email }}</td>
                                <td scope="row">{{ Auth::user()->created_at }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
