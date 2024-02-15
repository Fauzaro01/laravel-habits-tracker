@extends('layouts.main')

@section('title')
Analisis Habits
@endsection
@section('content')

<div class="card mt-3">
    <div class="card-header">
        <h4>{{$habit->name}}</h4>
    </div>
    <div class="card-body">
        <div class="row">

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Total Goals Tercapai</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$habit->logs->count()}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="bi bi-activity text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border border-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Target (Harian)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$habit->daily_count}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="bi bi-calendar text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Progress Hari ini
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{($habit->logs()->whereDate('date', '<=', now())->count() / $habit->daily_count)*100}}%</div>
                                    </div>
                                    <div class="col">
                                        <div class="progress progress-sm mr-2">
                                            <div id="progressBar" class="progress-bar bg-info" role="progressbar" style="width: 0%" aria-valuenow="{{($habit->logs()->whereDate('date', '<=', now())->count() / $habit->daily_count)*100}}" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="bi bi-clipboard text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Pending Requests</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-xl-6 mb-4">
                <div class="card border-secondary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                    Description Habits</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$habit->description}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="bi bi-activity text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 mb-4">
                <div class="card border-secondary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                    Controls Habit</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    <form action="" method="post">
                                    <input type="hidden" name="habit_id" value="{{$habit->id}}">
                                    @csrf
                                    <button class="btn btn-warning" type="submit">[<i class="bi bi-send-plus"></i>] Absen</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="bi bi-activity text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<script>
    var progressBar = document.getElementById('progressBar');
    var valueNow = progressBar.getAttribute('aria-valuenow')

    var width = 0;
    var speed = setInterval(frame, 50);

    function frame() {
        if (width >= valueNow) {
            clearInterval(speed);
        } else {
            width++;
            progressBar.style.width = width + '%'
        }
    }
</script>

@endsection