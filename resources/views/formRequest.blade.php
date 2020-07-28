@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Form Request
                        @if(session()->has('draft'))
                            <div style="float: right">
                                <a href= " {{ url('draft') }} " class="btn btn-primary btn-sm">Back to Draft</a>
                            </div>
                        @endif
                    </div>

                    <div class="card-body">

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
                        @if(session()->has('error'))
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <div class="alert-icon">
                                    <i class="far fa-fw fa-bell"></i>
                                </div>
                                <div class="alert-message">
                                    {{ session()->get('error') }}
                                </div>
                            </div>
                        @endif
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

                        <form method="POST" action="/saveRequest" id="submitForm">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name"
                                    value="{{ session()->get('draftToRequest')['name'] }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="requestType" class="col-md-4 col-form-label text-md-right">Request Type</label>
                                <div class="col-md-6">
                                    <select class="form-control" id="requestType" name="requestType">
                                        <option selected disabled>Choose</option>
                                        @foreach($requestType as $value)
                                            <option value="{{$value->id}}"
                                            {{session()->get('draftToRequest')['requestType'] == $value->id ? 'selected':''}}>{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="justification" class="col-md-4 col-form-label text-md-right">Justification</label>
                                <div class="col-md-6">
                                    <textarea id="justification" class="form-control" name="justification">{{ session()->get('draftToRequest')['justification'] }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="attachment" class="col-md-4 col-form-label text-md-right">Attachment</label>
                                <div class="col-md-6">
                                    <input id="attachment" type="file" class="form-control" name="attachment">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary" name="action" value="submit" >
                                        Send
                                    </button>
                                    <button type="submit" class="btn btn-link" name="action" value="save">
                                        Save in Draft
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
