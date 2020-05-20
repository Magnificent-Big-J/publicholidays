@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">South African Public Holiday</h1>
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="{{route('holidays.download')}}" role="button">Download</a>
            </p>
        </div>
        <div class="card">
            <div class="card-body">
                <table class="table table-stripped">
                    <tbody>
                        @foreach($holidays as $holiday)
                            <tr>
                                <td>{{$holiday->name}}</td>
                                <td>{{$holiday->public_holiday_date}}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
