@extends('layouts.app')

@section('content')
<div class="row">
  <ul class="msr_bread06 col-sm-12">
    <li><b>
      {!! link_to_route('tasks.index','Home',null,['class'=>'']) !!}</b>    
    </li>
    <li><b>
      {{ $task->content }}</b>
    </li>
  </ul>
</div>
    <div class="row">
        <div class="card card-title text-light bg-info text-center col-sm-12">
            <h1>{{ $task->content }}</h1>
        </div>
        <ul class="list-group list-group-flush col-sm-12">
            <li class="list-group-item bg-light"><h4>DeadLine: {{ $task->deadline }}</h4></li>
            <li class="list-group-item bg-light"><h4>Status: {{ $task->status }}</h4></li>
            <li class="list-group-item bg-light"><h4>Memo: {{ $task->memo }}</h4></li>
            <li class="list-group-item bg-light"><h4>達成度<div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100" style="{{ 'width:' . $progress . '%' }}">{{ $progress . '%' }}</div></h4></li>
        </ul>
        <div class="col-sm-12">
           <h4>
                @include('tasks.child_tasks.child_tasks',['task'=>$task,'childTasks'=>$childTasks])
          </h4>
            @if($task->user_id == null || $task->user_id == Auth::user()->id)
              <h4>{!! link_to_route('create.childtask','Create ChildTask',['id'=>$task->id],['class'=>'btn btn-light btn-block']) !!}</h4></li>
            @endif
        </div>
        
        <div class="col-sm-12">
            @if($task->user_id == null || $task->user_id == Auth::user()->id)
                <h3>{!! link_to_route('tasks.edit','Edit',['id'=>$task->id], ['class' => 'btn btn-secondary col-sm-12 mx-auto d-block mt-3']) !!}</h3>
                @if($task->parent_id==null)
                    {!! Form::model($task,['route'=>['tasks.destroy',$task->id],'method'=>'delete']) !!}
                @else
                    {!! Form::model($task,['route'=>['destroy.childtask',$task->id],'method'=>'delete']) !!}
                @endif
                <h3>{!! Form::submit('Delete',['class' => 'btn btn-danger col-sm-12 mx-auto d-block']) !!}</h3>
                {!! Form::close() !!}
            @endif    
        </div>
        </div>
    </div>
@endsection