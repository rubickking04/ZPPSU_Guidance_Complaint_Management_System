@extends('admin.layouts.app')
@section('contents')
<div class="card shadow">
    <div class="card-header text-sm-center fw-bold"><i class="bi bi-archive fw-bold"></i>{{ __(' Archive\'s Data') }}</div>
    <div class="card-body">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
        <div class="container">
            <div class="card-title">
                <h4 class="card-title text-start">{{ __('Archive Lists') }}</h4>
            </div>
            <div class="table-responsive-sm  ">
                <table class="table  table-sm text-center table-bordered table-striped table-hover">
                    <thead >
                        <tr>
                            <th scope="col">{{ __('User\'s ID') }}</th>
                            <th scope="col"> </th>
                            <th class="text-start" scope="col">{{ __('Complainant\'s Name')}}</th>
                            <th class="text-start" scope="col">Department</th>
                            <th class="text-start" scope="col">Categories</th>
                            <th scope="col">Year & Section</th>
                            <th scope="col">Archived at</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($complains as $complain)
                        <tr>
                            <th scope="row">{{ $complain->user_id }}</th>
                            <td scope="row"><img class="rounded-circle" src="{{asset('/storage/images/'.$complain->user->image)}}" alt="image" style="width: 50px;height: 50px; padding: 5px; margin: 0px; "></td>
                            <td class="text-start" scope="row">{{ $complain->user->name }}</td>
                            <td class="text-start" scope="row">{{ $complain->department }}</td>
                            <td class="text-start" scope="row">{{ $complain->category }}</td>
                            <td scope="row">{{ $complain->course_and_section }}</td>
                            <td scope="row">{{ $complain->created_at->format('m/d/y H:i:s') }}</td>
                            <td scope="row">
                                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModalCenter{{ $complain->id }}" {{ Popper::position('top')->arrow()->pop('View') }}>
                                <lord-icon
                                    src="https://cdn.lordicon.com/tyounuzx.json"
                                    trigger="loop-on-hover"
                                    colors="primary:#121331,secondary:#121331"
                                    stroke="100"
                                    style="width:25px;height:25px">
                                </lord-icon>
                                </button>
                                <div class="modal fade" id="exampleModalCenter{{ $complain->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">Complain Description</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <img src="{{ asset('/storage/images/'.$complain->image)}}" class="img-fluid" alt="">
                                                        </div>
                                                        <div class="text-start">
                                                            <div class="form-group">
                                                                <p class="text-left col-form-label fw-bold">{{ $complain->user->name }} </p>
                                                                <p class="text-muted"><i class="fas fa-globe-americas"></i>{{ ' '.$complain->created_at->diffForHumans() }}</p>
                                                                <p class="text-left col-form-label"><strong>{{ __('Message: ') }}</strong>{{ $complain->body }}</p>
                                                            </div>
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
                                <a href="{{ url('/admin/delete',$complain->id)}}" class="btn btn-danger text-white" onclick="return confirm('Are you sure to delete it permanently?')" {{ Popper::position('top')->arrow()->pop('Delete') }}>
                                    <lord-icon
                                        src="https://cdn.lordicon.com/gsqxdxog.json"
                                        trigger="loop-on-hover"
                                        colors="primary:#ffffff,secondary:#ffffff"
                                        stroke="100"
                                        style="width:25px;height:25px">
                                    </lord-icon>
                                </a>
                                <a href="{{ url('/admin/restore',$complain->id)}}" class="btn btn-warning text-dark" onclick="return confirm('Are you sure to restore this data?')" {{ Popper::position('top')->arrow()->pop('Restore') }}>
                                    <lord-icon
                                        src="https://cdn.lordicon.com/nxaaasqe.json"
                                        trigger="loop-on-hover"
                                        colors="primary:#121331,secondary:#121331"
                                        stroke="100"
                                        style="width:25px;height:25px">
                                    </lord-icon>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{ $complains->links() }}
            <div class="col-auto">
                <span id="password" class="form-text">
                    {{ __('Showing '.$complains->count().' of '.$complains->total().' results in page '.$complains->currentPage().' of '.$complains->lastPage()) }}
                </span>
            <a href="{{  url('/admin/deletes/' ) }}" class="btn btn-danger float-end text-white md-3" onclick="return confirm('Are you sure to delete all of these data permanently?')">{{ __('Delete All') }}</a>
            <a href="{{  url('/admin/restores/' ) }}" class="btn btn-dark float-end md-3">{{ __('Restore All') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
