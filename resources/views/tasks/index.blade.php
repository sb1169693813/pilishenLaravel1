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
              @foreach($toDo as $task)
                <tr>
                  <td class="first-cell">{{ $task->title }}</td>
                  <td class="icon-cell">@include('tasks._checkForm')</td>
                  <td class="icon-cell">@include('tasks._editForm')</td>
                  <td class="icon-cell">@include('tasks._deleteForm')</td>
                </tr>
              @endforeach
            </table>
            {{ $toDo->links() }}
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
          {{ $done->links() }}
        </div>
      <!-- Nav tabs -->
    </div>
@endsection
