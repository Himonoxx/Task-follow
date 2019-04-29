@extends('layouts.app')

@section('content')
<div class="row">
  <ul class="msr_bread06 col-sm-12">
    <li>
      {!! link_to_route('tasks.index','Home',null,['class'=>'']) !!}    
    </li>
    <li>
      {!! link_to_route('tasks.show',$parentTask->content,['id'=>$parentTask->id],['class'=>'']) !!} 
    </li>
    <li>
      {{ $task->content }}
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
            <li class="list-group-item"><h4>
        <div class="col-sm-12">
          <h3>{!! link_to_route('edit.childtask','Edit',['id'=>$task->id], ['class' => 'btn btn-secondary col-sm-12 mx-auto d-block mt-3']) !!}</h3>
          {!! Form::model($task,['route'=>['destroy.childtask',$task->id],'method'=>'delete']) !!}
          <h3>{!! Form::submit('Delete',['class' => 'btn btn-danger col-sm-12 mx-auto d-block']) !!}</h3>
          {!! Form::close() !!}
        </div>
    
          
    </div>
@endsection