<?php
function taskCountArray($projects)
{
  $taskNum = [];
  foreach ($projects as $key => $value) {
    $taskCount = $value->tasks()->count();
    array_push($taskNum, $taskCount);
  }
  return $taskNum;
}
// rgba(179,181,198,1);
function rand_color()
{
  $r = rand(0,255);
  $g = rand(0,255);
  $b = rand(0,255);
  return "rgba(".$r.",".$g.",".$b.",0.5)";
}
