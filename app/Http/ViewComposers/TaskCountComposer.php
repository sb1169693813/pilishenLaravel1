<?php
namespace App\Http\ViewComposers;

use illuminate\View\view;
use App\Repositories\TaskRepository;

class TaskCountComposer{
  protected $repo;

  public function __construct(TaskRepository $taskRepo)
  {
    $this->repo = $taskRepo;
  }


  public function composer(View $view){
    $view->with([
      'total' =>   $this->repo->total(),
      'doneCount' => $this->repo->doneCount(),
      'toDoCount' => $this->repo->toDoCount()
    ]);
  }
}
