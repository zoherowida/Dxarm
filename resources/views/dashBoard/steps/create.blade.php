@extends('dashBoard.layouts.app')

@section('content')
    <main class="content">
        <div class="container-fluid p-0">
            <h1 class="h3 mb-3">Add New Step</h1>
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
                            <form method="POST" action="/dashboard/step">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-form-label col-sm-3 text-sm-left">Name</label>
                                    <div class="col-sm-9">
                                        <input type="name" class="form-control" placeholder="Name" name="name" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-sm-3 text-sm-left">Step Number</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" placeholder="step#" name="stepNumber" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-sm-3 text-sm-left">User</label>
                                    <div class="col-sm-9">
                                        <select id="userId" name="userId" class="form-control">
                                            <option selected disabled>Choose</option>
                                            @foreach($users as $value)
                                                <option value="{{$value->id}}">{{ $value->name }}</option>
                                            @endforeach
                                        </select>
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
