@extends('layouts.main')

@section('title')
Dashboard
@endsection
@section('content')

<div class="row justify-content-center mt-4">
    <div class="col-md-11">
        <div class="card">
            <div class="card-header">Dashboard</div>
            <div class="card-body">
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    {{ $message }}
                </div>
                @else
                <div class="alert alert-success">
                    You are logged in!
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection