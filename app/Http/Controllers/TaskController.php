<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Task;
use App\Http\Requests\CreateTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use Auth;
use App\Project;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $toDo = Auth::user()->tasks()->where('completed', 0)->paginate(15);
        $done = Auth::user()->tasks()->where('completed', 1)->paginate(15);
        $projectList = Project::lists('name','id');
        return view('tasks.index', compact('toDo','done', 'projectList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTaskRequest $request)
    {
    //  dd($request->projectId);
      Task::create([
        'title' => $request->createtitle,
        'project_id' => $request->projectId
      ]);
      return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTaskRequest $request, $id)
    {
        //dd($request);
        $task = Task::findOrFail($id);
        $task->title = $request->title;
        $task->project_id = $request->projectList;
        $task->save();
        return redirect()->back();
    }

    public function check($id)
    {
      $task = Task::findOrFail($id);
      $task->completed = 1;
      $task->save();
      return redirect()->back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Task::findOrFail($id)->delete();
        return redirect()->back();
    }
}
