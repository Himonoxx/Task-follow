@extends('layouts.app')

@section('content')
<div class="row">
  <ul class="msr_bread06 col-sm-12">
    <li>
        {!! link_to_route('tasks.index','Home',null,['class'=>'']) !!}    
    </li>
    @if(isset($parentTask))
        <li>
            {!! link_to_route('tasks.show',$parentTask->content,['id'=>$parentTask->id],['class'=>'']) !!}
        </li>
        <li>
            新規作成
        </li>
    @else
        <li>
            新規作成
        </li>
        </ul>
    @endif
</div>
    <div class="row">
        <div class="card card-title text-light bg-dark text-center col-sm-12">
            @if(isset($parentTaskId))
                <h1>[Child] New Task</h1>
            @else
                <h1>[Parent] New Task</h1>
            @endif
        </div>
    </div>
    <div class="row card">
        @if(isset($parentTaskId))
            {!! Form::model($task, ['route' => ['store.childtask', $parentTaskId], 'method' => 'POST']) !!}
        @else
            {!! Form::model($task, ['route' => 'tasks.store']) !!}
        @endif
        <div class="form-group d-flex mt-4">
            <div class="col-sm-2 mt-1">
                <h4>{!! Form::label('content', 'Task:') !!}</h4>
            </div>
            <div class="col-sm-10">
                {!! Form::text('content', null, ['class' => 'form-control']) !!}    
            </div>
        </div>
        <div class="form-group d-flex mt-4">
            <div class="col-sm-2 mt-1">
                <h4>{!! Form::label('deadline', 'DeadLine:') !!}</h4>
            </div>
            <div class="col-sm-10">
                {!! Form::text('deadline', null, ['class' => 'form-control','input type'=>'date']) !!}    
            </div>
        </div>
        <div class="form-group d-flex mt-4">
            <div class="col-sm-2 mt-1">
                <h4>{!! Form::label('status', 'Status:') !!}</h4>
            </div>
            <div class="col-sm-10 mx-auto">
                <h4>{!! Form::select('status', ['未実施' => '未実施','完了' => '完了'],null) !!}</h4>
            </div>
        </div>
        <div class="form-group d-flex mt-4">
            <div class="col-sm-2 mt-1">
                <h4>{!! Form::label('memo', 'Memo:') !!}</h4>
            </div>
            <div class="col-sm-10">
                {!! Form::textarea('memo',null, ['class' => 'form-control', 'rows' => '2']) !!}  
            </div>
        </div>
        <h2>{!! Form::submit('Create', ['class' => 'btn btn-dark col-sm-11 mx-auto d-block']) !!}</h2>
    </div>
            {!! Form::close() !!}
        </div>
    </div>



@endsection