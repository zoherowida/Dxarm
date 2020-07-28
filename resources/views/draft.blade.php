@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">My Draft</div>
                    <table class="table">
                        <thead>
                        <tr>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($allDraft as $key => $value)
                            <tr>
                                <th scope="{{$key}}"><a href="">{{$key}}</a> </th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="card-body">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
