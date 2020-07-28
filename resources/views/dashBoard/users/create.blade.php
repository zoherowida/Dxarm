@extends('dashBoard.layouts.app')

@section('content')
    <main class="content">
        <div class="container-fluid p-0">
            <h1 class="h3 mb-3">Add New User</h1>
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <div class="alert-message">
                                <h4 class="alert-heading">Errors !</h4>
                                @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                    <hr>
                                @endforeach
                                <div class="btn-list">
                                    <button class="btn btn-light" type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">Okay</span>
                                    </button>

                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-body">
                            <form method="POST" action="/dashboard/user">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-form-label col-sm-3 text-sm-left">Name</label>
                                    <div class="col-sm-9">
                                        <input type="name" class="form-control" placeholder="Name" name="name" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-sm-3 text-sm-left">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" placeholder="Email" name="email" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-sm-3 text-sm-left">Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" placeholder="Password" name="password" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-sm-3 text-sm-left">Confirm Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 ml-sm-auto">
                                        <button type="submit" class="btn btn-primary">Add</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>@endsection
