@extends('layouts.main')

@section('title')
Analisis Habits
@endsection
@section('content')

<div class="container px-4 border pb-3">
  <div class="row gx-5">
    <div class="col">
      <canvas style="width: 200px; height:200px" id="myChart"></canvas>
    </div>
    <div class="col">
      <canvas style="width: 200px; height:200px" id="myPie"></canvas>
    </div>
  </div>
</div>

<div class="container px-4 mt-2">
  <div class="row gx-3">
    <div class="col">
      <div class="p-3 border bg-light">
        <p>ID habit: <small class="text-muted">{{$habit->id}}</small></p>
        <p>Name Habit: <small class="text-muted">{{$habit->name}}</small></p>
        <p>Deskripsi Habit: <small class="text-muted">{{$habit->description}}</small></p>
      </div>
    </div>
    <div class="col">
      <div class="p-3 border bg-light">
        <p>Target Harian: <small class="text-muted">{{$habit->daily_count}}</small></p>
        <p>Total Check'in: <small class="text-muted">{{$habit->logs()->count()}}</small></p>
      </div>
    </div>
  </div>
</div>

<div class="card container mt-2">
  <div class="card-header">Habit Logs</div>
  <div class="card-body">
    <div class="overflow-auto" style="max-height: 600px;">
      @foreach($habit->logs as $log)
      <div class="row p-2 border">
        <div class="col">
          <div>Waktu: {{$log->created_at}}</div>
        </div>
      </div>
      @endforeach

    
    </div>

  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://unpkg.com/axios@1.6.7/dist/axios.min.js"></script>

<script>
  const ctxChart = document.getElementById('myChart');
  const ctxPie = document.getElementById('myPie');

  async function getDataset() {
    try {
      const response = await axios.get("{{route('api.getdata', $habit->id)}}");
      return response.data;
    } catch (error) {
      console.error(error);
    }
  }

  window.addEventListener('DOMContentLoaded', async function() {
    const dataset = await getDataset();
    console.log(dataset);

    var chartBar = new Chart(ctxChart, {
      type: 'bar',
      data: {
        labels: dataset.result.logs.index,
        datasets: [{
          label: 'Tercapai',
          data: dataset.result.logs.value,
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
          y: {
            beginAtZero: true
          }
        },
        plugins: {
          legend: {
            position: 'top',
          },
          title: {
            display: true,
            text: 'Statistik Kebiasaan'
          }
        }
      }
    });

    var chartPie = new Chart(ctxPie, {
      type: 'pie',
      data: {
        labels: ["Berhasil", "Gagal"],
        datasets: [{
          label: 'Jumlah yang Diraih',
          data: [dataset.result.info.berhasil, dataset.result.info.gagal],
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            position: 'top',
          },
          title: {
            display: true,
            text: 'Tingkat Keberhasilan'
          }
        }
      },
    });
  });
</script>
@endsection