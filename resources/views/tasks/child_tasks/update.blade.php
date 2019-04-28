@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="card card-title text-light bg-dark text-center col-sm-12">
            <h1>New ChildTask</h1>
        </div>
    </div>
    <div class="row card">
        @if(isset($parentTaskId))
            {!! Form::model($task, ['route' => ['store.childtask', $childTaskId], 'method' => 'POST']) !!}
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
                <h4>{!! Form::select('status', ['未実施' => '未実施','完了' => '完了','HELP'=>'HELP'],null) !!}</h4>
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