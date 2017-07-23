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
