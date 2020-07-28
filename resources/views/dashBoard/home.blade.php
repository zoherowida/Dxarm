@extends('dashBoard.layouts.app')

@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <div class="row">
                <div class="col-xl-12 d-flex">
                    <div class="w-100">
                        <div class="row">
                            @foreach($analytics as $key => $value)
                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-4"> {{ $key }} </h5>
                                        <h1 class="display-5 mt-1 mb-3"> {{ $value }} </h1>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

@endsection
