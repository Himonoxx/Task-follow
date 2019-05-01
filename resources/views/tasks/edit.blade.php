@extends('layouts.app')

@section('content')
<div class="row">
  <ul class="msr_bread06 col-sm-12">
    <li><b>
        {!! link_to_route('tasks.index','Home',null,['class'=>'']) !!}</b>    
    </li>
    @if(isset($parentTask))
        <li><b>
            {!! link_to_route('tasks.show',$parentTask->content,['id'=>$parentTask->id],['class'=>'']) !!}</b>
        </li>
        <li><b>
            {!! link_to_route('show.childtask',$task->content,['id'=>$task->id],['class'=>'']) !!}</b>
        </li>
        <li><b>
            編集</b>
        </li>
    @else
        <li><b>
            {!! link_to_route('tasks.show',$task->content,['id'=>$task->id],['class'=>'']) !!}</b>
        </li>
        <li><b>
            編集</b>
        </li>
        </ul>
    @endif
</div>
  <div class="row">
        <div class="card card-title text-light bg-info text-center col-sm-12">
            @if($task->parent_id == null)
                <h1>[Parent] Edit Page</h1>
            @else
                <h1>[Child] Edit Page</h1>
            @endif
        </div>
    </div>
    <div class="row card">
        @if($task->parent_id == null)
            {!! Form::model($task, ['route' => ['tasks.update',$task->id],'method'=>'put']) !!}    
        @else
            {!! Form::model($task, ['route' => ['update.childtask',$task->id],'method'=>'put']) !!}
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
                <h4>{!! Form::select('status', ['未実施' => '未実施','完了' => '完了'], null) !!}</h4>
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
        <h3>{!! Form::submit('Submit', ['class' => 'btn btn-dark col-sm-11 mx-auto d-block']) !!}</h3>
    </div>
            {!! Form::close() !!}
        </div>
    </div>

@endsection