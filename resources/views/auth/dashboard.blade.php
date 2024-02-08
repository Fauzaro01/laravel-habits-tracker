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
                @else
                <div id="temp_msg" class="alert alert-success">
                    You are logged in!
                </div>
                @endif
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="col-md-3" id="hiddenform" style="display: none;">
                    <form class="d-flex" action="{{route('habits.store')}}" method="post">
                        @csrf
                        <input name="name" class="form-control" type="text" placeholder="Tambahkan Judul Lists">
                        <button type="submit" class="btn btn-dark"><i class="bi bi-check-circle"></i></button>
                    </form>
                </div>
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Progress</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($habits as $index => $habit)
                        <tr>
                            <th scope="row">{{ $index + 1 }}</th>
                            <td>{{$habit->name}}</td>
                            <td>11/100</td>
                            <td>Belum Selesai</td>
                            <td>
                                <a class="btn btn-sm btn-secondary" href="#">Analisis</a>
                                <a class="btn btn-sm btn-dark" href="#">Lihat</a>
                                <a class="btn btn-sm btn-warning" href="#">Edit</a>
                                <a class="btn btn-sm btn-danger" href="#">Hapus</a>
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

                        setTimeout(() => {
                            divMsg.style.animation = 'fadeOut 0.5s forwards';
                            setTimeout(() => {
                                divMsg.style.display = 'none';
                            }, 500)
                        }, 3000);

                    });
                </script>

            </div>
        </div>
    </div>
</div>

@endsection