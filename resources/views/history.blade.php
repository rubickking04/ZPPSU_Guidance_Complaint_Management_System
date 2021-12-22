@extends('layouts.app')
@section('content1')
    <div class="col-md-8">
        <div class="card shadow mb-5">
            <div class="card-body">
                <div class="card-title">
                    <h4 class="card-title text-center">{{ __('My History') }}</h4>
                </div>
                <div class="table-responsive">
                    <table class="table data-table table-sm table-bordered table-striped table-hover nowrap">
                        <thead>
                            <tr>
                                <th scope="col">Department</th>
                                <th scope="col">Categories</th>
                                <th scope="col">Year & Section</th>
                                <th class="text-center" scope="col">Status</th>
                                <th class="text-center" scope="col">Approved at</th>
                                <th class="text-center" scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $complain as $comp )
                                <tr>
                                    <td>{{ $comp->department }}</td>
                                    <td>{{ $comp->category }}</td>
                                    <td>{{ $comp->course_and_section }}</td>
                                    @if($comp->deleted_at)
                                        <td class="text-center text-success">{{ __('Approved') }}</td>
                                    @else
                                        <td class="text-center text-info">{{ __('Not approved') }}</td>
                                    @endif
                                    @if($comp->deleted_at)
                                        <td class="text-center">{{ $comp->deleted_at->diffForHumans() }}</td>
                                    @else
                                        <td class="text-center text-muted">{{ $comp->deleted_at }}</td>
                                    @endif
                                    <td class="text-center">
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModalCenter{{ $comp->id }}" {{ Popper::position('left')->arrow()->pop('View') }}>
                                            <lord-icon
                                                src="https://cdn.lordicon.com/tyounuzx.json"
                                                trigger="loop-on-hover"
                                                colors="primary:#121331,secondary:#121331"
                                                stroke="100"
                                                style="width:25px;height:25px">
                                            </lord-icon>
                                        </button>
                                        <div class="modal fade" id="exampleModalCenter{{ $comp->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                                                    <img src="{{ asset('/storage/images/'.$comp->image)}}" class="img-fluid" alt="">
                                                                </div>
                                                                <div class="text-start">
                                                                    <div class="form-group">
                                                                        <p class="text-left col-form-label fw-bold">{{ $comp->user->name}} </p>
                                                                        <p class="text-muted"><i class="fas fa-globe-americas"></i>{{ ' '.$comp->created_at->diffForHumans() }}</p>
                                                                        <p class="text-left col-form-label"><strong>{{ __('Message: ') }}</strong>{{ $comp->body }}</p>
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
                                        <a href="{{ url('/history/delete',$comp->id)}}" class="btn btn-danger text-white" onclick="return confirm('Are you sure to delete it permanently?')" {{ Popper::position('top')->arrow()->pop('Delete') }}>
                                            <lord-icon
                                                src="https://cdn.lordicon.com/gsqxdxog.json"
                                                trigger="loop-on-hover"
                                                colors="primary:#ffffff,secondary:#ffffff"
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
                <div class="mb-3 row">
                    <div class="col-md-6">
                        <a href="{{ route('complaint') }}" class="btn btn-primary">{{ __('Back') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
