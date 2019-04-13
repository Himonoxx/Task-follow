@extends('layouts.app')

@section('content')
  <div class="row">
        <div class="card card-title text-light bg-info text-center col-sm-12">
            <h1>Edit Page</h1>
        </div>
    </div>
    <div class="row card">
        {!! Form::model($task, ['route' => ['tasks.update',$task->id],'method'=>'put']) !!}
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
                {!! Form::text('deadline', null, ['class' => 'form-control']) !!}    
            </div>
        </div>
        <div class="form-group d-flex mt-4">
            <div class="col-sm-2 mt-1">
                <h4>{!! Form::label('status', 'Status:') !!}</h4>
            </div>
            <div class="col-sm-10 mx-auto">
                <h4>{!! Form::select('status', ['完了' => '完了', '未実施' => '未実施','実施中'=>'実施中','HELP'=>'HELP'], null, ['placeholder' => 'Select Status--->']) !!}</h4>
            </div>
        </div>
        <div class="form-group d-flex mt-4">
            <div class="col-sm-2 mt-1">
                <h4>{!! Form::label('memo', 'Memo:') !!}</h4>
            </div>
            <div class="col-sm-10">
                {!! Form::text('memo', null, ['class' => 'form-control']) !!}    
            </div>
        </div>
        <h3>{!! Form::submit('Edit', ['class' => 'btn btn-dark col-sm-11 mx-auto d-block']) !!}</h3>
    </div>
            {!! Form::close() !!}
        </div>
    </div>

@endsection