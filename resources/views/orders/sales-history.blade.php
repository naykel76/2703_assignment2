@extends('layouts.app')

@section('title', $title)


@section('top-a')
@include('navs.nav-supplier')
@endsection


@section('content')

<div class="row">

  <div class="col">

    <h1>{{ $title }} </h1>

  </div>

  <div class="col txt-r">

    <h1><span>Total Sales: ${{ $totalSales }}</span></h1>

  </div>

</div>

<h3 class="mb">Weekly Sales</h3>

@foreach ($salesArray as $key => $value)

<hr>

<span><strong>Week Ending:</strong> {{$key}}</span> &nbsp;&nbsp; <span><strong>Total Sales:</strong> ${{ $value }}</span> <br>

@endforeach

<hr>

<h3>Sales Graph</h3>

<canvas id="weekly-sales" width="1000" height="400"></canvas>

@endsection


@section('bottom-b')
<script src="/js/chart.js"></script>

<script>
  var ctx = document.getElementById('weekly-sales').getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: {!! json_encode($dates) !!},
      // labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
      datasets: [{
        label: 'Weekly Sales',
        // data: [1,50,100],
        data: {!! json_encode($totals) !!},
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)',
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)',
        ],
        borderColor: [
          'rgba(255, 99, 132, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)',
          'rgba(255, 99, 132, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)',
        ],
      }]
    },
    options: {
      responsive: false
    }
  });
</script>
@endsection





{{--

<script src="/js/chart.js"></script>

<script>
  var ctx = document.getElementById('weekly-sales').getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
  });
</script> --}}
