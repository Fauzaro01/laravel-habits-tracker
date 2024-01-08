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

                <div class="card">
                    <div class="card-header">
                        <div class="container d-flex">
                            <h3 class="mx-1">Daftar List Saya</h3>
                            <button id="toggle-hform" class="btn btn-outline-dark btn-block px-3"><i class="bi bi-bookmark-plus-fill"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            {{ $message }}
                        </div>
                        @endif
                        <div class="col-md-3" id="hiddenform" style="display: none;">
                            <form class="d-flex" action="{{route('list.store')}}" method="post">
                                @csrf
                                <input name="title" class="form-control" type="text" placeholder="Tambahkan Judul Lists">
                                <button type="submit" class="btn btn-dark"><i class="bi bi-check-circle"></i></button>
                            </form>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama List</th>
                                    <th scope="col">Total Tasks</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($lists as $index => $list)
                                <tr>
                                    <th>{{$index+1}}</th>
                                    <th>{{$list->title}}</th>
                                    <th>None</th>
                                    <th>
                                        <a class="btn btn-outline-dark" href="{{route('list.index', $list->id)}}">View</a>
                                    </th>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <script>
                    var divHidden = document.getElementById('hiddenform');
                    var btnToggle = document.getElementById('toggle-hform');
                    document.addEventListener('DOMContentLoaded', function() {
                        btnToggle.addEventListener('click', function() {
                            divHidden.style.display = divHidden.style.display === "none" ? '' : 'none';
                        });
                    });
                </script>

            </div>
        </div>
    </div>
</div>

@endsection