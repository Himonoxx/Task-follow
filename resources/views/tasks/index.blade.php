@extends('layouts.app')

@section('content')
    @if(Auth::check())
        <div class="col-sm-12">
        @include('tasks.all_tasks',['tasks'=>$tasks])
        </div>
        <div class="col-sm-12">
            <h4>{!! link_to_route('tasks.create','Add Task',null,['class'=>'btn btn-secondary col-sm-12']) !!}</h4>
        </div>
    @else
        <div class="center-jumbotron">
            <div class="text-center card"><h1>タスクに追われる毎日から卒業しませんか？</h1></div>
        </div>
        <p>毎日何かに追われて生きている。仕事で人生が終わってしまうと危機感を感じている。</br>
        そんな人の手助けになればいいなと思って作ったタスク管理アプリです。。</p>
    @endif
@endsection
        