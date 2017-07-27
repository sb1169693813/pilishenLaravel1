@extends('layouts.app')

@section('content')
<!-- <div class="col-md-8 col-md-offset-2"> -->
  <div class="container col-md-4">
    <canvas id="pieChart" width="300" height="300"></canvas>
    <div id="pie-data" data-todo={{ $toDoCount }} data-done={{ $doneCount }} data-total={{ $total }}></div>
  </div>
  <div class="container col-md-4">
    <canvas id="barChart" width="300" height="300"></canvas>
    <div id="bar-data" data-projects= {!!json_encode(taskCountArray($projects))!!}
    data-projectname = {!!json_encode($projectName,JSON_UNESCAPED_UNICODE)!!} data-total = {{ $total }}></div>
  </div>
  <div class="container col-md-4">
    <canvas id="radarChart" width="300" height="300"></canvas>
  </div>
<!-- </div> -->
@endsection

@section('customJs')
  <script src="{{ asset('js/charts.js') }}"></script>
  <script type="text/javascript">
      var ctxRadar = $("#radarChart");
      var radarData = {
        labels: ['任务总数', '未完成', '已完成'],
          datasets: [
              <?php
                $i = 0;
                foreach ($projects as $project)
                {
                  $name = $project->name;
                  $totalTasks = $project->tasks()->count();
                  $todoTasks = $project->tasks()->where('completed',0)->count();
                  $doneTasks = $project->tasks()->where('completed',1)->count();
                echo "{";
               ?>
                label: "<?php echo $name;?>",
                backgroundColor: "{{ rand_color() }}",
                borderColor: "{{ rand_color() }}",
                pointBackgroundColor: "{{ rand_color() }}",
                pointBorderColor: "#fff",
                pointHoverBackgroundColor: "#fff",
                pointHoverBorderColor: "{{ rand_color() }}",
                data:[<?php echo $totalTasks?>,<?php echo $todoTasks?>,<?php echo $doneTasks?>]
                <?php
                ($i+1)== $projects->count()  ? print "}" : print "},";
                  $i++;
                 ?>
              <?php
                }
              ?>

          ]
        };

      var myRadarChart = new Chart(ctxRadar, {
        type: 'radar',
        data: radarData,
        options: {
          resonsive: true,
          title:{
            display: true,
            text: '项目之间的任务完成情况'
          },
          legend:{
            display: true,
            position: "bottom"
          }
        }
      });
  </script>
@endsection
