@extends('layouts.app')

@section('content')
        <div class="row">
        <div class="card card-title text-light bg-dark text-center col-sm-12">
            <h1>My Task</h1>
        </div>
    </div>
    <div class="row">
    @if(count($tasks)>0)
        <table class="table thead-dark">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Task</th>
                    <th>Deadline</th>
                    <th>Status</th>
                    <th>Add</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                <tr>
                    <td>{{ $task->id }}</td>
                    <td>{{!! link_to_route('tasks.show',$task->content,['content'=>$task->content]) !!}</td>
                    <td>{{ $task->deadline}}</td>
                    <td>{{ $task->status}}</td>
                    <td><button class="btn btn-7 btn-7g btn-icon-only icon-plus"></button></td>
                </tr>
                @endforeach
            </tbody>
            
        </table>
    @else
        <div class="card card-title text-center col-sm-12">
            <h2>--Nothing Tasks--</h2>
        </div>
    
    @endif
        <div class="col-sm-12">
                <h4>{!! link_to_route('tasks.create','Add Task',null,['class'=>'btn btn-secondary col-sm-12']) !!}</h4>
        </div>
    </div>
@endsection