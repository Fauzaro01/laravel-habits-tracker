@extends('layouts.main')

@section('title')
Dashboard
@endsection
@section('content')

<div class="row justify-content-center mt-4">
    <div class="col-md-11">
        <div class="card">
            <div class="card-header">
                <div class="container d-flex">
                    <h3 class="mx-1">Daftar Habits</h3>
                    <button id="toggle-hform" class="btn btn-outline-dark ms-auto"><i class="bi bi-bookmark-plus-fill"></i></button>
                </div>
            </div>
            <div class="card-body">
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    {{ $message }}
                </div>
                @elseif($message = Session::get('warn'))
                <div id="temp_msg" duration="6000" class="alert alert-warning">
                    {{ $message }}
                </div>
                @else
                <div id="temp_msg" duration="3000" class="alert alert-success">
                    You are logged in!
                </div>
                @endif
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="col-9" id="hiddenform" style="display: none;">
                    <form class="d-flex" action="{{route('habits.store')}}" method="post">
                        @csrf
                        <div class="col-4 mx-1">
                            <input name="name" class="form-control" type="text" placeholder="Tambahkan Judul Lists">
                        </div>
                        <div class="col-2 mx-2">
                            <input name="daily_count" class="form-control" type="number" placeholder="Gols harian" min="1" max="15">
                        </div>
                        <button type="submit" class="btn btn-dark align-items-end"><i class="bi bi-check-circle"></i></button>
                    </form>
                </div>
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Progress Hari ini</th>
                            <th scope="col">Total Progress</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($habits as $index => $habit)
                        <tr>
                            <th scope="row">{{ $index + 1 }}</th>
                            <td>{{$habit->name}}</td>
                            <td>2/5</td>
                            <td>45</td>
                            <td>Belum Selesai</td>
                            <td class="d-flex">
                                <a class="btn btn-sm btn-secondary" href="#"><i class="bi bi-bar-chart-line"></i></a>
                                <a class="btn btn-sm btn-dark" href="{{route('habits.index', $habit->id)}}"><i class="bi bi-eye"></i></a>
                                <a class="btn btn-sm btn-warning" href="{{route('habits.updatepage', $habit->id)}}"><i class="bi bi-pencil-square"></i></a>
                                <form action="{{route('habits.destroy', $habit->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" type="submit"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <style>
                    @keyframes fadeIn {
                        0% {
                            opacity: 0;
                        }

                        100% {
                            opacity: 1;
                        }
                    }

                    @keyframes fadeOut {
                        0% {
                            opacity: 1;
                        }

                        100% {
                            opacity: 0;
                        }
                    }
                </style>
                <script>
                    var divHidden = document.getElementById('hiddenform');
                    var btnToggle = document.getElementById('toggle-hform');
                    var divMsg = document.getElementById('temp_msg');
                    document.addEventListener('DOMContentLoaded', function() {
                        btnToggle.addEventListener('click', function() {
                            if (divHidden.style.display === "none") {
                                divHidden.style.display = 'block';
                                divHidden.style.animation = 'fadeIn 0.5s forwards';
                            } else {
                                divHidden.style.animation = 'fadeOut 0.5s forwards';
                                setTimeout(function() {
                                    divHidden.style.display = 'none';
                                }, 500); // Waktu yang sama dengan durasi animasi (0.5s)
                            }
                        });

                        var duration = divMsg.getAttribute('duration');
                        setTimeout(() => {
                            divMsg.style.animation = `fadeOut 0.5s forwards`;
                            setTimeout(() => {
                                divMsg.style.display = 'none';
                            }, 500)
                        }, duration);

                    });
                </script>

            </div>
        </div>
    </div>
</div>

@endsection