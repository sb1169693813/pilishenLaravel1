@extends('layouts.app')

@section('content')
  <div class="container col-md-4">
    <canvas id="pieChart" width="300" height="300"></canvas>
  </div>
  <div class="container col-md-4">
    <canvas id="barChart" width="300" height="300"></canvas>
  </div>
@endsection

@section('customJs')
  <script src="{{ asset('js/Chart.min.js') }}"></script>
  <script>
  $(document).ready(function(){
    var ctxPie = $("#pieChart");
    data = {
      datasets: [{
      // These labels appear in the legend and in the tooltips when hovering different arcs
        data: [{{ $toDoCount }}, {{ $doneCount }}],
        backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)'
        ]
      }],

      labels: [
       '未完成',
       '已完成'
      ]
    };
    var myPieChart = new Chart(ctxPie,{
      type: 'pie',
      data: data,
      options: {
        resonsive: true,
        title:{
          display: true,
          text: '所有任务的完成比例（总数:{{ $total }}）'
        },
        legend:{
          display:false
        }
      }
    });
    var ctxBar = document.getElementById("barChart");
    var myBarChart = new Chart(ctxBar, {
      type: 'bar',
      data: {
          labels: {!! $projectName !!},
          datasets: [{
              data: {!! json_encode(taskCountArray($projects)) !!},
              backgroundColor: [
                  'rgba(255, 99, 132, 0.2)',
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(255, 206, 86, 0.2)',
                  'rgba(75, 192, 192, 0.2)'
              ],
              borderColor: [
                  'rgba(255,99,132,1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)'
              ],
              borderWidth: 1
          }]
      },
      options: {
        resonsive: true,
        title:{
          display: true,
          text: '所有任务的完成比例（总数:{{ $total }}）'
        },
        legend:{
          display:false
        }
      }
    });
  });

  </script>
@endsection
