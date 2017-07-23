@if($errors->has('createtitle'))
  <ul class="alert alert-danger">
    @foreach($errors->get('createtitle') as $error)
      <li>{{ $error }}</li>
    @endforeach
  </ul>
@endif
{!! Form::open(['route'=>['tasks.store','projectId'=>$project->id],'class'=>'form-inline']) !!}
<!-- {!! Form::open(['route' => 'tasks.store', 'method' => 'POST', 'class' => 'form-inline']) !!} -->
    <td class="date-cell"></td>
    <td class="first-cell">
      {!! Form::text('createtitle',null,['placeholder'=>'有什么好完成的任务吗？', 'class' => 'form-control']) !!}
    </td>
    <td class="icon-cell">
      <button type="submit" class="btn btn-success">
          <i class="fa fa-plus"></i>
      </button>
    </td>
{!! Form::close() !!}
