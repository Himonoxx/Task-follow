@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="card card-title text-light bg-info text-center col-sm-12">
            <h1>{{ $task->content }}</h1>
        </div>
      <div class="row card">
        <div class="d-flex mt-4">
            <div class="col-sm-2 mt-1">
              <h4>DeadLine:</h4>
            </div>
            <div class="col-sm-10">
              {{ $task->deadline }}
            </div>
        </div>
      <div class="d-flex mt-4">
        <div class="col-sm-2 mt-1">
          <h4>Status:</h4>
        </div>
        <div class="col-sm-10">
          {{ $task->status }}    
        </div>
      </div>
        <div class="form-group d-flex mt-4">
            <div class="col-sm-2 mt-1">
                <h4>Memo:</h4>
            </div>
          <div class="col-sm-10 mx-auto">
            <h4>{{ $task->memo }}</h4>
          </div>
        </div>
        <h3>{!! link_to_route('tasks.edit','Edit',['id'=>$task->id], ['class' => 'btn btn-dark col-sm-11 mx-auto d-block mb-2']) !!}</h3>
        {!! Form::model('route'=>['tasks.destroy',$task->id],'method'=>'delete']) !!}
          <h3>{!! Form::submit('Delete',['class' => 'btn btn-dark col-sm-11 mx-auto d-block mb-2']) !!}</h3>
        {!! Form::close() !!}
    </div>
        </div>
    </div>

@endsection