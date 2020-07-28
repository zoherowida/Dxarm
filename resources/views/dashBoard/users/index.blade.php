@extends('dashBoard.layouts.app')

@section('content')
    <main class="content">
        <div class="row mb-2 mb-xl-3">

            <div class="col-auto ml-auto text-right mt-n1">
                <a href="{{url('dashboard/user/create')}}" class="btn btn-primary">
                    <i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Add</span>
                </a>
            </div>
        </div>

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
            <div class="row">
                <div class="col-12">
                    <div class="card flex-fill">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Users</h5>
                        </div>
                        <table class="table table-hover my-0">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th class="d-none d-xl-table-cell">Name</th>
                                <th class="d-none d-xl-table-cell">Email</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $value)
                                <tr>
                                    <td>{{$value->id}}</td>
                                    <td class="d-none d-xl-table-cell">{{$value->name}}</td>
                                    <td class="d-none d-xl-table-cell">{{$value->email}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </main>

@endsection
