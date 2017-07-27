@extends('layouts.app')

@section('content')
    <div class="container tasks-tips">
      <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active">
            <a href="#toDo" aria-controls="home" role="tab" data-toggle="tab">待完成</a>
          </li>
          <li role="presentation">
            <a href="#done" aria-controls="profile" role="tab" data-toggle="tab">已完成</a>
          </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
          <!-- 未完成列表 -->
          <div role="tabpanel" class="tab-pane active" id="toDo">
            <table class="table table-striped">
              <thead>
                @include('tasks._createForm')
              </thead>
              @foreach($toDo as $task)
                <tr>
                  <td class="date-cell">{{ $task->updated_at->diffForHumans()  }}</td>
                  <!-- <td class="first-cell">{{ $task->title }}</td> -->
                  <td class="first-cell">{{ link_to_route('tasks.show', $task->title, $task->id) }}</td>
                  <td class="icon-cell">@include('tasks._checkForm')</td>
                  <td class="icon-cell">@include('tasks._editForm')</td>
                  <td class="icon-cell">@include('tasks._deleteForm')</td>
                </tr>
              @endforeach
            </table>
          </div>
          <!-- 已完成列表 -->
          <div role="tabpanel" class="tab-pane" id="done">
            <table class="table table-striped">
              @foreach($done as $task)
                <tr>
                  <td>{{ $task->title }}</td>
                </tr>
              @endforeach
            </table>
          </div>
        </div>
      <!-- Nav tabs -->

    </div>
@endsection
