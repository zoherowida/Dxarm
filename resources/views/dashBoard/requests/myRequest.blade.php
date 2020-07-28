@extends('dashBoard.layouts.app')

@section('content')
<main class="content">
    @if(session()->has('message'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <div class="alert-icon">
            <i class="far fa-fw fa-bell"></i>
        </div>
        <div class="alert-message">
            {{ session()->get('message') }}
        </div>
    </div>
    @endif
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3">MY Requests</h1>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4">
                @foreach($requests as $value)
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">{{ $value->name }}</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Type : {{ $value->RequestType->name }}</li>
                        <li class="list-group-item">justification : {{ $value->justification }}</li>
                        <li class="list-group-item">
                            @if($value->statusId == 1)
                            Status : Approved
                            @elseif($value->statusId == 2)
                            Status : Rejected
                            @else
                            <div class="row">
                                <div class="col-lg-6">
                                    <a href="{{url('dashboard/approveRequest',[$value->id,1])}}" class="btn btn-primary">
                                        <span class="align-middle">Approved</span>
                                    </a>
                                </div>
                                <div class="col-lg-6">
                                    <a href="{{url('dashboard/approveRequest',[$value->id,2])}}" class="btn btn-primary">
                                        <span class="align-middle">Rejected</span>
                                    </a>
                                </div>
                            </div>
                            @endif
                        </li>
                    </ul>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</main>

@endsection
