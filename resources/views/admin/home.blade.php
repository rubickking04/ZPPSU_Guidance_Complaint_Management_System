@extends('admin.layouts.app')

@section('contents')
<div class="card shadow">
    <div class="card-header text-sm-center fw-bold"><i class="bi bi-table me-3"></i>{{ __('Data Table') }}</div>
    <div class="container">
        <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">{{ session('status') }}</div>
        @endif
            <div class="table-responsive-sm ">
                <table class="table data-table table-sm table-bordered table-striped table-hover nowrap">
                    <h4 class="card-title">{{ __('User\'s Lists') }}</h4>
                    <thead>
                        <tr>
                            <th class="header text-center filter-select filter-exact" scope="col">{{ ('User\'s ID') }}</th>
                            <th class="header text-center" scope="col"> </th>
                            <th class="header filter-select filter-exact" scope="col">@sortablelink('name')</th>
                            <th class="header text-start text-dark filter-select filter-exact" scope="col">@sortablelink('email')</th>
                            <th class="header text-center" scope="col">Status</th>
                            <th class="header text-center" scope="col">Actions</th>
                            <th class="header text-center" scope="col">Activity</th>
                            <th class="header text-center" scope="col">@sortablelink('created_at')</th>
                        </tr>
                    </thead>
                    @foreach ($users as $user)
                    <tbody>
                        <tr>
                            <th class="text-center" scope="row">{{ $user->id }}</th>
                            <td class="text-center" scope="row"><img class="rounded-circle" src="{{asset('/storage/images/'.$user->image)}}" alt="image" style="width: 50px;height: 50px; padding: 5px; margin: 0px; "></td>
                            <td class="text-start" scope="row">{{ $user->name }}</th>
                            <td  class="text-start" scope="row">{{ $user->email }}</td>
                            @if( $user->email_verified_at)
                                <td  class="text-center text-success fw-bold" scope="row">{{ __(' Verified') }}</td>
                            @else
                                <td  class="text-center text-secondary fw-bold" scope="row">{{ __('Not Verified') }}</td>
                            @endif
                            <td  class="text-center" scope="row"><button type="button" class=" btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModalCenter{{ $user->id }}" {{ Popper::position('top')->arrow()->pop('View Details') }}>
                                <lord-icon
                                    src="https://cdn.lordicon.com/tyounuzx.json"
                                    trigger="loop"
                                    colors="primary:#121331,secondary:#3080e8"
                                    stroke="100"
                                    style="width:25px;height:25px">
                                </lord-icon>
                                    {{ __('') }}</button>
                                <div class="modal fade" id="exampleModalCenter{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">Users Description</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-5">
                                                        <img src="{{ asset('/storage/images/'.$user->image)}}" class="img-fluid" alt="">
                                                    </div>
                                                    <div class="col-7">
                                                        <div class="text-start">
                                                            <p><strong>Name: </strong>{{ $user->name }}</p>
                                                            <p><strong>Username: </strong>{{ $user->username }}</p>
                                                            <p><strong>Email: </strong>{{ $user->email }}</p>
                                                            <p><strong>Contact No.: </strong>{{ $user->phone }}</p>
                                                            <p><strong>Gender: </strong>{{ $user->gender }}</p>
                                                            <p><strong>Birthday: </strong>{{ $user->birth_date }}</p>
                                                            <p><strong>Address: </strong>{{ $user->address }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td  class="text-center" scope="row">
                                @if(Cache::has('is_online' . $user->id))
                                    <span class="text-success fw-bold">• Online</span>
                                @else
                                    <span class="text-secondary fw-bold">• Offline</span>
                                @endif
                            </td>
                            <td  class="text-center" scope="row">{{ $user->created_at->format('m/d/y h:i:s') }}</td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
                {{ $users->links() }}
            </div>
            <div class="col-auto">
                <span class="form-text">
                    {{ __('Showing '.$users->count().' of '.$users->total().' results in page '.$users->currentPage()).' of '.$users->lastPage() }}
                </span>
            </div>
        </div>
    </div>
</div>

@endsection
